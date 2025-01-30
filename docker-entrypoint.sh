#!/bin/sh
set -e

# Run migrations (if needed)
php artisan migrate --force

# Start PHP-FPM and Nginx
exec "$@"
