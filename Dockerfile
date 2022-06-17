FROM php:7.4-cli-alpine3.16

COPY --from=composer:2.3 /usr/bin/composer /usr/local/bin/composer

CMD php -v
