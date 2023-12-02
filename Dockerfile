FROM php:8.1-fpm

ARG UID
ARG GID

ENV UID=$UID
ENV GID=$GID

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    vim \
    unzip \
    intl \

RUN curl --silent --show-error "https://getcomposer.org/installer" | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get install -y libicu-dev # required dependency for intl

RUN docker-php-ext-install pdo pdo_mysql intl

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

#PHP_INI_DIR : /usr/local/etc/php/conf.d
COPY ../xdebug/xdebug.ini "${PHP_INI_DIR}/conf.d"

WORKDIR /var/www

# Your PHP container will be built and during that time a group and user will be created
# with your host user ID and group ID.
# At host in my terminal I can run id -u and id -g to check your ids

#RUN addgroup --system --gid ${GID} parser
#RUN adduser --system --uid ${UID} --disabled-password parser
# adds user www-data to parser group
#RUN adduser www-data parser

# similar to:
# Set www-data to have UID 1000
# RUN usermod -u 1000 www-data;
# or just
# RUN addgroup --system --gid 1001 www-data
# RUN adduser --system --uid 1001 www-data
# but numbers can be different

# I needed to modify the user that PHP is actually running on in the container, 
# since by default it's using www-data. I could copy over a modified php.ini file, 
# but since it's just a few character changes 
# I decided to use a couple of commands in that same Dockerfile to replace two lines:
# replace  'user = www-data' with 'user = parser' and '-i' allows to overwrite original file
#RUN sed -i "s/user = www-data/user = parser/g" /usr/local/etc/php-fpm.d/www.conf
#RUN sed -i "s/group = www-data/group = parser/g" /usr/local/etc/php-fpm.d/www.conf


