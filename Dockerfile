FROM serversideup/php:8.3-fpm-nginx

ENV PHP_OPCACHE_ENABLE=1

USER root

# Install Node.js
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# Install PHP intl, exif, and gd extensions
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libexif-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install intl exif gd

# Set up working directory
WORKDIR /var/www/html

# Copy project files
COPY --chown=www-data:www-data . /var/www/html

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

USER www-data

# Install dependencies and build assets
RUN npm install && npm run build

# Install PHP dependencies
RUN composer install --no-interaction --optimize-autoloader

# Run migrations and seeds
RUN php artisan migrate --force && php artisan db:seed --force

# Ensure PHP-FPM runs properly
USER root
RUN mkdir -p /run/php && chown -R www-data:www-data /run/php

# Expose the Nginx port
EXPOSE 80

# Start PHP-FPM and Nginx
CMD ["supervisord", "-c", "/etc/supervisord.conf"]
