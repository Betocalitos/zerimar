FROM php:7.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libwebp-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j$(nproc) gd

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath zip

# Get Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Create necessary directories first (they might be excluded by .dockerignore)
RUN mkdir -p storage/framework/{sessions,cache,views,testing} \
    && mkdir -p storage/logs \
    && mkdir -p storage/app/public/equipments \
    && mkdir -p bootstrap/cache \
    && mkdir -p database/seeds \
    && mkdir -p database/factories \
    && mkdir -p database/migrations

# Copy composer files first (for better caching)
COPY composer.json composer.lock ./

# Install dependencies
RUN composer install --no-interaction --no-scripts --prefer-dist --optimize-autoloader

# Copy application files
COPY . .

# Run post-autoload scripts now that app code is present
RUN composer run-script post-autoload-dump || true

# Create storage link
RUN php artisan storage:link || true

# Set permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage \
    && chmod -R 755 /var/www/bootstrap/cache

# Expose port
EXPOSE 9000

CMD ["php-fpm"]
