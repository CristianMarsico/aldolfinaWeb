FROM node:22 AS frontend

WORKDIR /app

COPY package*.json ./

RUN npm install

COPY . .

RUN npm run build


FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    zip

RUN docker-php-ext-install pdo pdo_pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction

COPY . .

COPY --from=frontend /app/public/build ./public/build

RUN chmod -R 777 storage bootstrap/cache

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000