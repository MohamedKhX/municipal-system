FROM serversideup/php:8.3-fpm-nginx

ENV PHP_OPCACHE_ENABLE=1

USER root

# Install Node.js
RUN curl -sL https://deb.nodesource.com/setup_20.x | bash -
RUN apt-get install -y nodejs

# Install PHP intl, exif, and GD extensions
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libexif-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install intl exif gd

# Ensure proper permissions for the web application
COPY --chown=www-data:www-data . /var/www/html

USER www-data

# Install and build frontend dependencies
RUN npm install
RUN npm run build

# Run Composer with --ignore-platform-req=ext-exif to avoid issues in case the extension is not required.
RUN composer install --no-interaction --optimize-autoloader