# Usa una imagen de PHP con Apache que incluya las extensiones necesarias para Laravel.
FROM php:8.1-apache

# Instala las dependencias de Composer y optimiza la carga automática.
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configura Apache para que el punto de entrada sea index.php
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf


# Copia el archivo .htaccess desde la carpeta public del proyecto al contenedor.
COPY ./public/.htaccess /var/www/html/.htaccess

# Copia el resto de los archivos del proyecto al contenedor.
COPY . /var/www/html/

# Después de copiar los archivos del proyecto, ajusta los permisos de la carpeta storage
RUN chown -R www-data:www-data /var/www/html/storage
# Después de copiar los archivos del proyecto, ajusta los permisos de la carpeta storage y logs
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/storage/logs
RUN chmod -R 775 /var/www/html/storage /var/www/html/storage/logs

RUN docker-php-ext-install pdo_mysql


# Configura las variables de entorno de Laravel.
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Habilita el módulo de reescritura de Apache para las rutas amigables de Laravel.
RUN a2enmod rewrite

# Comando para iniciar Apache al ejecutar el contenedor
CMD ["apache2-foreground"]