FROM php:8.2-cli

# Purani line
RUN composer install --no-dev --optimize-autoloader

# Nayi line (lock file ignore karega, fresh install karega)
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader

CMD php artisan serve --host=0.0.0.0 --port=$PORT