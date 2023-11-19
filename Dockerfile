# Use an official PHP runtime as a parent image
FROM php:8.2-apache

ENV COMPOSER_ALLOW_SUPERUSER=1
# Set the working directory
WORKDIR /var/www/html

# Install required dependencies
RUN apt-get update && \
    apt-get install -y \
    libzip-dev \
    zip \
    unzip

# Enable Apache modules
RUN a2enmod rewrite

RUN docker-php-ext-install pdo_mysql zip

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the composer.json and composer.lock files to install dependencies
# COPY . /var/www/html
COPY composer.json composer.lock /var/www/html/

# Install PHP dependencies
RUN composer install --no-scripts --no-autoloader

# Copy the application files
COPY . /var/www/html/
COPY .env /var/www/html/

# Set the proper permissions
RUN chown www-data:www-data /var/www/html/.env
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Generate the application key
RUN php artisan key:generate

# Expose port 8000 (default for php artisan serve)
# EXPOSE 8000

# Start the Laravel application using php artisan serve
# CMD ["php", "artisan", "serve", "--host=127.0.0.1", "--port=8000"]

# Expose port 80
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]