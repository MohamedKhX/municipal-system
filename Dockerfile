FROM php:8.2-apache

# Enable Apache Rewrite Module
RUN a2enmod rewrite



# Update Document Root
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Install Dependencies
RUN apt-get update && apt-get install -y \
    libicu-dev libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install intl exif gd \

# Set working directory
WORKDIR /var/www/html

# Copy application files first
COPY . /var/www/html

# Install Node.js & Composer
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

RUN npm install
RUN npm run build
RUN composer install --no-interaction --optimize-autoloader

# Set Permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Run Migrations & Cache Config
RUN php artisan migrate --force && php artisan db:seed --force
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Expose Apache Port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
