FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    htop \
    curl \
    wget \
    git \
    libzip-dev \
    zip

COPY    getcomposer.sh /root/getcomposer.sh
RUN     chmod +x /root/getcomposer.sh && /root/getcomposer.sh

RUN     docker-php-ext-install zip
RUN     docker-php-ext-install pdo pdo_mysql

RUN apt-get install -y libmemcached-dev zlib1g-dev libssl-dev \
    && pecl install memcached \
    && docker-php-ext-enable memcached

COPY config/memcached.ini $PHP_INI_DIR/conf.d/

RUN docker-php-source extract \
    && mkdir /usr/src/php/ext/amqp \
    && curl -L https://github.com/php-amqp/php-amqp/archive/master.tar.gz | tar -xzC /usr/src/php/ext/amqp --strip-components=1

RUN apt-get update && apt-get install -y librabbitmq-dev

RUN     docker-php-ext-install amqp

WORKDIR /backend

CMD ["php-fpm"]
