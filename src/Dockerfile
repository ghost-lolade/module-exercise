# ./src/Dockerfile
#############################
# Stage 1 - Build
#############################
FROM php:8.2-fpm-bullseye AS builder

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libpq-dev \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-install pdo_mysql zip mbstring

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy only composer files
COPY composer.json composer.lock ./

# Install PHP dependencies
RUN composer install --no-scripts --no-dev --no-autoloader --prefer-dist --no-interaction

# Copy the entire app
COPY . .

# Run composer dump-autoload after code is copied
RUN composer dump-autoload --optimize

#############################
# Stage 2 - Production
#############################
FROM php:8.2-fpm-bullseye

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libpq-dev \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-install pdo_mysql zip mbstring \
    && rm -rf /var/lib/apt/lists/*

# Copy application from builder stage
WORKDIR /var/www/html
COPY --from=builder /var/www/html ./

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

RUN php artisan config:clear

EXPOSE 9000
CMD ["php-fpm"]
