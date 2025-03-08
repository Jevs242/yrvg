# Use an official PHP runtime as a parent image
FROM php:8.1-apache

# Set the working directory in the container
WORKDIR /var/www/html

# Install mysqli
RUN docker-php-ext-install mysqli

# Copy the PHP file into the container's web directory
COPY . /var/www/html/

# Set the ServerName to suppress the warning about Apache's domain name
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Enable mod_rewrite for Apache (optional, useful for many PHP applications)
RUN a2enmod rewrite

# Expose port 80 (the default HTTP port)
EXPOSE 80
