#!/bin/sh
set -e

# Copy seed images to volume if they don't exist yet
SEED_DIR="/var/www/storage/app/public/equipments-seed"
DEST_DIR="/var/www/storage/app/public/equipments"
if [ -d "$SEED_DIR" ] && [ "$(ls -A "$SEED_DIR" 2>/dev/null)" ]; then
    echo "Syncing seed images to volume..."
    cp -an "$SEED_DIR"/* "$DEST_DIR/" 2>/dev/null || true
    rm -rf "$DEST_DIR/equipments" 2>/dev/null || true
fi

# Run migrations if needed
php artisan migrate --force

# Ensure storage link exists
php artisan storage:link || true

# Start php-fpm in background
php-fpm &

# Start nginx in foreground
nginx -g 'daemon off;'