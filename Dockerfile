FROM php:8.2-apache

# Copy all project files into Apache’s web root
COPY . /var/www/html/

# Set working directory to public folder (where index.php lives)
WORKDIR /var/www/html/public

# Configure Apache to use the public folder as DocumentRoot
RUN echo '<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        Options Indexes FollowSymLinks\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf \
    && docker-php-ext-install mysqli \
    && a2enmod rewrite

# Expose port 80 for web traffic
EXPOSE 80
