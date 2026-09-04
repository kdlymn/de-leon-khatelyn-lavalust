ARG PHP_VERSION=8.2

FROM php:${PHP_VERSION}-apache

# Install PDO MySQL extension
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite for LavaLust routing
RUN a2enmod rewrite

# Allow .htaccess overrides (fixed sed syntax)
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Copy application files into the container
COPY . /var/www/html/

# Set correct web permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80