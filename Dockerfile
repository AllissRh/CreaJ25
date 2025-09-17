FROM php:8.2-apache
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl \
    && docker-php-ext-install pdo pdo_mysql zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . /var/www/html

WORKDIR /var/www/html

RUN composer install --optimize-autoloader --no-dev

RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

EXPOSE 80

CMD ["apache2-foreground"]
