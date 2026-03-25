FROM php:8.2-cli

# System dependencies install
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip \
    && docker-php-ext-install pdo pdo_mysql zip

# Composer install
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Working directory set
WORKDIR /app

# Project copy
COPY . .

# Laravel dependencies install
RUN composer install --no-dev --optimize-autoloader

# Permissions fix
RUN chmod -R 777 storage bootstrap/cache

# Port expose
EXPOSE 8080

# Start Laravel server
CMD php artisan serve --host=0.0.0.0 --port=8080