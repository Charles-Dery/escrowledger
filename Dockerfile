FROM php:8.2-apache

# Copy project files into Apache’s web root
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html

# Install mysqli extension for MySQL
RUN docker-php-ext-install mysqli

# Expose port 80 for web traffic
EXPOSE 80
