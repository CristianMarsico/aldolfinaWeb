# =========================
# FRONTEND (Vite)
# =========================
FROM node:22 AS frontend

WORKDIR /app

COPY package*.json ./

RUN npm install

COPY . .

RUN npm run build


# =========================
# BACKEND (Laravel)
# =========================
FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libpq-dev

RUN docker-php-ext-install pdo pdo_pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# IMPORTANTE:
# Copiar TODO antes del composer install
COPY . .

RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction

# Copiar assets compilados de Vite
COPY --from=frontend /app/public/build ./public/build

# Permisos Laravel
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=${PORT:-10000}