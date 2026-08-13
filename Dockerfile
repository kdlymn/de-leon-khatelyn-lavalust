ARG PHP_VERSION=8.5

FROM php:${PHP VERSION}-apache

# Install PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Allow .htaccess overrides
RUN sed -I'1<Directory Vvar\/www\/>/,/<VDirectory>/ s/AllowOverride None/AllowOverride All'/etc/apache2/apache2.conf

# Copy app files
COPY . /var/www/html/

# Fix permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html
    
EXPOSE 80