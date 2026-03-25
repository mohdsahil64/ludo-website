FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    && docker-php-ext-install zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN rm -f composer.lock && composer install --no-dev --optimize-autoloader

CMD php artisan serve --host=0.0.0.0 --port=$PORT