#!/bin/sh
set -e

# Copy seed images to volume if it's empty (first deploy)
if [ -z "$(ls -A /var/www/storage/app/public/equipments/ 2>/dev/null)" ]; then
    echo "Copying seed images to volume..."
    cp -a /var/www/storage/app/public/equipments-seed/. /var/www/storage/app/public/equipments/ 2>/dev/null || true
fi

# Run migrations if needed
php artisan migrate --force

# Ensure storage link exists
php artisan storage:link || true

# Start php-fpm in background
php-fpm &

# Start nginx in foreground
nginx -g 'daemon off;'