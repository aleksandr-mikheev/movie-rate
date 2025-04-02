FROM spiralscout/roadrunner:2024.3.5 AS roadrunner
FROM php:8.3-cli-alpine3.21

RUN mkdir root/history

RUN apk update && \
    apk add --no-cache patch && \
    apk del && \
    rm -rf /var/lib/apt/lists/*

COPY --link php.ini $PHP_INI_DIR/conf.d/
RUN cp "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

COPY --from=roadrunner /usr/bin/rr /usr/bin/rr

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions

RUN install-php-extensions @composer && \
    ln -s composer /usr/local/bin/c

RUN install-php-extensions opcache intl sockets pcov pdo_pgsql pgsql pcntl

WORKDIR /var/www/html

CMD rr serve -d -c .rr.dev.yaml
