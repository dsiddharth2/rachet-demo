FROM php:7-apache
RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get update -y && apt-get install -y libpng-dev
RUN a2enmod rewrite
RUN service apache2 restart
RUN php -r "copy('http://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/bin --filename=composer && \
    php -r "unlink('composer-setup.php');"
RUN apt-get install --assume-yes git

RUN apt-get install wget

RUN cd ~

RUN wget https://github.com/zeromq/libzmq/releases/download/v4.2.1/zeromq-4.2.1.tar.gz \
    && tar -xvzf zeromq-4.2.1.tar.gz \
    && cd zeromq-4.2.1 \
    && apt-get install --assume-yes libtool pkg-config build-essential autoconf automake uuid-dev \
    && apt-get install --assume-yes checkinstall \
    && ./configure \
    && make \
    && checkinstall \
    && ldconfig

RUN apt-get update && apt-get install -y zlib1g-dev \
    && pecl install zmq-beta \
    && docker-php-ext-install zip \
    && docker-php-ext-enable zmq