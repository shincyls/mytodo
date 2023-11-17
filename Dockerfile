# Use an official PHP runtime as a parent image
FROM php:8.2-fpm

# Set the working directory to /var/www
WORKDIR /var/www

# Allow Composer to run as superuser
ENV COMPOSER_ALLOW_SUPERUSER=1

# Copy the current directory contents into the container at /var/www
COPY . /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    && apt-get install -y libzip-dev zip unzip \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer 
    # && composer self-update --ignore-platform-reqs

# Install Laravel dependencies
# RUN composer install --optimize-autoloader --no-dev
# RUN composer install --no-dev
# RUN composer dump-autoload --optimize

# Expose port 8000 (default for php artisan serve)
EXPOSE 8000

# Start the Laravel application using php artisan serve
CMD ["php", "artisan", "serve", "--host=127.0.0.1", "--port=8000"]