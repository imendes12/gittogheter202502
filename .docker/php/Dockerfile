FROM php:8.4-fpm

WORKDIR /var/www

RUN rm -rf /var/www/html

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev \
    apt-utils \
    libonig-dev \
    libpq-dev

RUN docker-php-ext-install zip pgsql pdo pdo_pgsql
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-install gd

# RUN mkdir -p /usr/src/php/ext/redis; \
# 	curl -fsSL https://pecl.php.net/get/redis --ipv4 | tar xvz -C "/usr/src/php/ext/redis" --strip 1; \
# 	docker-php-ext-install redis;

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ARG PUID=1001
ARG PGID=1001

RUN groupadd -g $PGID developer
RUN useradd -u $PUID -ms /bin/bash -g developer user

COPY --chown=user:developer . /var/www

USER user

EXPOSE 9000

CMD ["php-fpm"]
