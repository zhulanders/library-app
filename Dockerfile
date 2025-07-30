FROM php:8.2-apache

# Install required PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev zip libonig-dev libxml2-dev libpng-dev libjpeg-dev \
    libicu-dev \
    && docker-php-ext-install pdo pdo_mysql mysqli intl

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set DocumentRoot to public folder (CI4 uses /public)
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Copy app into container
COPY . /var/www/html

# Fix permissions
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
