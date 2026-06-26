FROM richarvey/nginx-php-fpm:3.1.6

ENV WEBROOT=/var/www/html/public

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8080

CMD ["/start.sh"]
