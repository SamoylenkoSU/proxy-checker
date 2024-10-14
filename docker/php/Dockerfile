FROM	ubuntu:22.04

ENV     DEBIAN_FRONTEND         noninteractive

RUN     apt-get update && apt-get install -qqy \
		software-properties-common \
		unzip \
		curl \
        make

RUN		LC_ALL=C.UTF-8 add-apt-repository -y ppa:ondrej/php

RUN     apt-get update && apt-get install -qqy \
		php8.2-cli \
		php8.2-fpm \
		php8.2-mbstring \
		php8.2-mysql \
		php8.2-zip \
		php8.2-curl \
		php8.2-xml \
        php8.2-amqp

RUN     apt-get update &&  apt-get install -y default-jre
RUN     apt-get upgrade -y

RUN     apt-get install -y php8.2-dev php8.2-grpc php8.2-protobuf protobuf-compiler protobuf-compiler-grpc

COPY    --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY    config/www.conf /etc/php/8.2/fpm/pool.d/www.conf

WORKDIR /backend

EXPOSE 9000

CMD  ["/usr/sbin/php-fpm8.2", "-F"]