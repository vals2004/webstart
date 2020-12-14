FROM php:7.2-apache
VOLUME ["/var/www/html"]

RUN apt-get update && apt-get install -y apt-utils
RUN apt-get install -y \
        zlib1g-dev \
        libicu-dev \
        libpq-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-install mysqli \
    && docker-php-ext-configure mbstring \
    && docker-php-ext-install -j$(nproc) mbstring \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install intl zip opcache pdo_mysql \
    && docker-php-ext-configure calendar --enable-calendar \
    && docker-php-ext-install -j$(nproc) calendar

RUN echo Europe/Kiev > /etc/timezone && \
    dpkg-reconfigure -f noninteractive tzdata

RUN set -x && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# install phpMyAdmin
RUN mkdir /var/www/phpmyadmin \
    && curl https://files.phpmyadmin.net/phpMyAdmin/5.0.4/phpMyAdmin-5.0.4-english.tar.gz \
    | tar -xz -C /var/www/phpmyadmin --strip-components=1
RUN cat /var/www/phpmyadmin/config.sample.inc.php | sed -e 's/localhost/mysql/' > /var/www/phpmyadmin/config.inc.php

RUN echo "Alias /phpmyadmin/ /var/www/phpmyadmin/" >>/etc/apache2/apache2.conf

EXPOSE 80
