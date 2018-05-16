FROM php:7.1.8-apache

COPY www /var/www
COPY .docker/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY .docker/php.ini /usr/local/etc/php/

RUN docker-php-ext-install mbstring pdo pdo_mysql
RUN mkdir /var/www/temp
RUN chmod 0777 /var/www/temp
RUN chown -R www-data:www-data /var/www
RUN a2enmod rewrite
