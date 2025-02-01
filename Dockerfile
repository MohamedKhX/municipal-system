FROM php:8.2-apache

# Enable Apache Rewrite Module
RUN a2enmod rewrite

# Update Document Root
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Ensure public directory exists
RUN mkdir -p /var/www/html/public

# Install Dependencies
RUN apt-get update && apt-get install -y \
    libicu-dev libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg || echo "Skipping GD configuration" \
    && docker-php-ext-install intl exif gd || echo "Skipping failed PHP extension"

# Copy files early to ensure package.json is present
COPY --chown=www-data:www-data . /var/www/html

# Switch to root for dependency installation
USER root

# Install Node.js & Composer
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

WORKDIR /var/www/html

# Ensure package.json exists before running npm
RUN test -f package.json && npm install || echo "No package.json found, skipping npm install"
RUN test -f package.json && npm run build || echo "No package.json found, skipping npm build"

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

# Switch to www-data user
USER www-data

# Expose Apache Port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
