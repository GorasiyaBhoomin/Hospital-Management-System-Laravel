
# Build frontend assets
FROM node:20-alpine AS frontend

WORKDIR /app

COPY package.json yarn.lock* ./

RUN corepack enable && yarn install

COPY . .

RUN yarn build


# Laravel PHP environment
FROM php:8.3-apache

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libicu-dev libpng-dev libjpeg-dev libfreetype6-dev libonig-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring bcmath exif pcntl gd zip intl \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction

# Copy Vite production assets
COPY --from=frontend /app/public/build ./public/build

# Configure Apache for Laravel public directory
RUN sed -ri 's!/var/www/html!/var/www/html/public!g' \
    /etc/apache2/sites-available/000-default.conf \
    && sed -i 's/Listen 80/Listen 10000/' /etc/apache2/ports.conf \
    && sed -i 's/:80>/:10000>/' /etc/apache2/sites-available/000-default.conf \
    && printf '<Directory /var/www/html/public>\nAllowOverride All\nRequire all granted\n</Directory>\n' \
    > /etc/apache2/conf-available/laravel.conf \
    && a2enconf laravel

# Laravel permissions
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 10000

CMD ["apache2-foreground"]
