FROM  php:8.3-apache

RUN apt-get update && \
    apt-get install -y \
        libxml2-dev \
        gettext \
        libpng-dev \
        libzip-dev \
        libfreetype6-dev \
        libmcrypt-dev \
        libpng-dev \
        libjpeg-dev \
        libpng-dev \
        npm \
        git

RUN docker-php-ext-install -j$(nproc) xml exif pdo_mysql gettext iconv mysqli zip
RUN docker-php-ext-configure gd --with-freetype --with-jpeg

RUN    docker-php-ext-install -j$(nproc) gd

COPY ./apache/default.conf /etc/apache2/apache2.conf
COPY . /var/www/html/
COPY ./logs/* /var/www/html/tumsifu-sacco/
WORKDIR /var/www/html

RUN a2enmod rewrite

# Configure PHP
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN sed -i 's/^upload_max_filesize.*$/upload_max_filesize = 2G/g' $PHP_INI_DIR/php.ini
RUN sed -i 's/^post_max_size.*$/post_max_size = 2G/g' $PHP_INI_DIR/php.ini
RUN sed -i 's/^memory_limit.*$/memory_limit = 2G/g' $PHP_INI_DIR/php.ini
RUN sed -i 's/^max_execution_time.*$/max_execution_time = 120/g' $PHP_INI_DIR/php.ini
