FROM adnanahmady/php:1.0.6

USER root
RUN docker-php-ext-install pcntl
USER docker
