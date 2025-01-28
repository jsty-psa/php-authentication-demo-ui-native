# Use an official PHP image with extensions
FROM php:8.4-fpm

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    nginx \
    supervisor \
    && apt-get clean && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install mbstring exif pcntl bcmath gd
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy project files
COPY . .
COPY supervisord.conf /etc/supervisor/supervisord.conf
COPY ./nginx/default.conf /etc/nginx/nginx.conf

# Install project dependencies
RUN composer install

# Set permissions
RUN chown -R www-data:www-data /var/www

# Expose port
EXPOSE 80

# Start PHP-FPM server
CMD ["supervisord", "-n", "-c", "/etc/supervisor/supervisord.conf"]
