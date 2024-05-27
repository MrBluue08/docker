FROM php:8.2-apache

# Install Composer
RUN apt-get update && \
    apt-get install -y git && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Enable required Apache modules
RUN a2enmod rewrite

# Install PDO MySQL extension
RUN docker-php-ext-install pdo_mysql

# Copy the SQL file into the container
COPY escaperun.sql /docker-entrypoint-initdb.d/

# Copy project files
COPY . /var/www/html/

ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /var/www/html/laravel
RUN composer install

# Expose port 80
EXPOSE 80

CMD php artisan migrate
CMD php artisan serve --host=0.0.0.0 --port=8080


# The CMD instruction provides a command to run when a container starts
# CMD ["apache2-foreground"]
