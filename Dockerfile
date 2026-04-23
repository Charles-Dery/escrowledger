FROM php:8.2-apache

# Copy project files into Apache’s web root
COPY . /var/www/html/

# Set working directory to public folder (where index.php lives)
WORKDIR /var/www/html/public

# Install mysqli extension for MySQL
RUN docker-php-ext-install mysqli

EXPOSE 80
