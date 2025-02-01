FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Install system dependencies as root
RUN apt-get update && apt-get install -y \
    libicu-dev libpng-dev libjpeg-dev libfreetype6-dev \
    libzip-dev curl unzip git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install intl exif gd zip pdo pdo_mysql \
    && a2enmod rewrite

# Configure Apache (as root)
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Install Composer (as root)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js (as root)
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Create application user and set directory permissions
RUN useradd -u 1000 -d /var/www -s /bin/bash -g www-data www-data \
    && mkdir -p /var/www/.npm \
    && chown -R www-data:www-data /var/www

# Copy application files with proper permissions
COPY --chown=www-data:www-data . .

# Switch to application user
USER www-data
ENV HOME=/var/www

# Install frontend dependencies
RUN npm install --cache /var/www/.npm

# Build frontend assets
RUN npm run build

# Install PHP dependencies
RUN composer install --no-interaction --optimize-autoloader

# Switch back to root for final system configuration
USER root

# Set directory permissions for web server
RUN chown -R www-data:www-data /var/www/html \
    && find /var/www/html -type d -exec chmod 755 {} \; \
    && find /var/www/html -type f -exec chmod 644 {} \; \
    && chmod -R 775 storage bootstrap/cache

# Run application setup
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Ensure proper ownership of Apache run directories
RUN chown -R www-data:www-data /var/run/apache2 \
    && chown -R www-data:www-data /var/log/apache2

# Switch back to www-data for execution
USER www-data

# Expose and run
EXPOSE 80
CMD ["apache2-foreground"]
