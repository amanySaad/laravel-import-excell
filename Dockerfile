# FROM jrottenberg/ffmpeg as ffmpeg
FROM php:8.1-apache

#Update & Install exts
RUN apt-get update -y --fix-missing && apt-get upgrade -y 
RUN apt-get install -y git iputils-ping libavdevice-dev && apt-get clean \
    && rm -rf /var/lib/apt/lists/*
RUN apt-get update -y --fix-missing
RUN apt-get install -y ffmpeg
RUN apt-get update -y --fix-missing
RUN apt-get install -y zip libzip-dev unzip nano libicu-dev libmemcached-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev libgmp-dev && rm -r /var/lib/apt/lists/*
RUN pecl install memcached
RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis
RUN apt-get update -y --fix-missing
# RUN docker-php-ext-configure zip --with-libzip
RUN echo extension=memcached.so >> /usr/local/etc/php/conf.d/memcached.ini
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install pdo pdo_mysql mysqli zip gd exif
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl 
# RUN pecl install pecl_http
# -j$(nproc)
RUN mkdir /var/logs_files
RUN mkdir /var/dist
RUN echo '<VirtualHost *:80>\n\
        ServerName localhost\n\
        ServerAdmin admin@localhost\n\
        DocumentRoot /var/www/public_html\n\
        ErrorLog /var/logs_files/error.log\n\
        CustomLog /var/logs_files/access.log combined\n\
        <Directory /var/www/public_html>\n\
            Options -Indexes +FollowSymLinks +MultiViews\n\
            AllowOverride All\n\
            Require all granted\n\
        </Directory>\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

RUN echo "#!/bin/sh" > /usr/local/bin/cls
RUN echo "clear" >> /usr/local/bin/cls
RUN chmod +x /usr/local/bin/cls

#enable models
RUN a2enmod rewrite
RUN a2enmod headers

#Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=. --filename=composer
RUN mv composer /usr/local/bin/

# COPY --from=ffmpeg /usr/local /usr/local

