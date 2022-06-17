FROM php:7.4-cli-alpine3.16

COPY --from=composer:2.3 /usr/bin/composer /usr/local/bin/composer
COPY ./ /app/
#COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
#
#RUN install-php-extensions \
#        mcrypt \
#        intl \
#        opcache \
#        bcmath \
#        pcntl \
#        pdo_mysql \
#        sysvsem
WORKDIR /app/

RUN composer install


