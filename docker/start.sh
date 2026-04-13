#!/bin/sh
set -e

# Run migrations if needed
php artisan migrate --force

# Ensure storage link exists
php artisan storage:link || true

# Start php-fpm in background
php-fpm &

# Start nginx in foreground
nginx -g 'daemon off;'