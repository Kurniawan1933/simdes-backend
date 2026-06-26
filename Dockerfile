FROM richarvey/nginx-php-fpm:3.1.6

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN cp .env.example .env

RUN php artisan key:generate

RUN chmod -R 777 storage bootstrap/cache

EXPOSE 8080

CMD ["/start.sh"]
