FROM php:8.2-apache

# Install required packages
RUN apt-get update && apt-get install -y \
    libzip-dev zip libonig-dev libxml2-dev libpng-dev libjpeg-dev \
    libicu-dev git curl unzip \
    && docker-php-ext-install pdo pdo_mysql mysqli intl

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set DocumentRoot to public folder (CI4 uses /public)
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy app into container
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Fix permissions
RUN chown -R www-data:www-data /var/www/html

# Install PHP dependencies (CodeIgniter)
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

EXPOSE 80
