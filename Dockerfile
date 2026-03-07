FROM php:8.2-cli-alpine3.16
RUN apk add --no-cache bash
COPY --from=composer:2.9 /usr/bin/composer /usr/bin/composer
WORKDIR /app/
CMD ["sleep", "infinity"]