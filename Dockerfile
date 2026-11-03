# ==============================================================================
# Stage 1: Build Frontend Assets (Vite / Tailwind / JS)
# ==============================================================================
FROM node:18-alpine AS frontend
WORKDIR /app
COPY package*.json vite.config.js ./
COPY resources ./resources
COPY public ./public
RUN npm install && npm run build

# ==============================================================================
# Stage 2: Production PHP 8.2 + Nginx Web Server
# ==============================================================================
FROM richarvey/nginx-php-fpm:latest

WORKDIR /var/www/html

# Copy all application code
COPY . /var/www/html

# Copy compiled Vite assets from Stage 1
COPY --from=frontend /app/public/build /var/www/html/public/build

# Render & Image environment configurations
ENV SKIP_COMPOSER=0
ENV WEBROOT=/var/www/html/public
ENV PHP_ERRORS_STDERR=1
ENV RUN_SCRIPTS=1
ENV REAL_IP_HEADER=1

# Laravel environment defaults
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr
ENV COMPOSER_ALLOW_SUPERUSER=1

# Install PHP production dependencies via Composer
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Set proper permissions for Laravel writable directories
RUN chown -R nginx:nginx /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose HTTP port (Render forwards external HTTPS traffic to port 80)
EXPOSE 80

# Start Nginx and PHP-FPM
CMD ["/start.sh"]

