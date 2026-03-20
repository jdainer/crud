# Usamos PHP 8.2 con Apache incluido
FROM php:8.2-apache

# Instalamos las extensiones de PDO para conectar con MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Habilitamos el módulo de reescritura de Apache (útil para rutas amigables)
RUN a2enmod rewrite

# Copiamos todo el contenido de tu carpeta actual al servidor de Render
COPY . /var/www/html/

# Damos permisos a la carpeta de trabajo
RUN chown -R www-data:www-data /var/www/html

# Exponemos el puerto 80
EXPOSE 80