FROM serversideup/php:8.3-fpm-nginx

# Set default environment variables
ENV PHP_OPCACHE_ENABLE=1 \
    APP_NAME="My App (Default)"

# Install system dependencies and PHP extensions
USER root
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libexif-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) intl exif gd pdo_mysql mbstring

# Install Node.js securely
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Copy dependency files first (for caching)
COPY --chown=www-data:www-data composer.* package*.json ./

# Install npm dependencies and build
RUN npm install && npm run build

# Install Composer dependencies
RUN composer install --no-interaction --optimize-autoloader

# Copy the rest of the application
COPY --chown=www-data:www-data . /var/www/html

# Copy and prepare entrypoint script
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Fix permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Override PHP-FPM pool settings
RUN printf "[www]\npm = dynamic\npm.max_children = 50\npm.start_servers = 10\npm.min_spare_servers = 8\npm.max_spare_servers = 20\n" > /etc/php/8.3/fpm/pool.d/z-overrides.conf

# Use the entrypoint script
ENTRYPOINT ["docker-entrypoint.sh"]

USER www-data
