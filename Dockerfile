FROM php:8.1-apache

RUN a2enmod rewrite

# Copia el archivo de configuración de Apache
COPY ./apache-config.conf /etc/apache2/sites-available/000-default.conf

# Establece los permisos correctos para el directorio web
RUN chown -R www-data:www-data /var/www/html
