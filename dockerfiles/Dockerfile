FROM php:8.2-fpm

# Build arguments
ARG user
ARG uid

# Update and install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libonig-dev \
    zip \
    unzip \
    libfreetype-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create a non-root user
RUN useradd -u $uid -ms /bin/bash -g www-data $user

# Set working directory
WORKDIR /var/www

# Copy only necessary files
COPY composer.json composer.lock /var/www/

# Install PHP dependencies during build
RUN composer install --no-scripts --no-dev

# Copy the rest of the application files
COPY --chown=$user:www-data . .

# Switch to the non-root user
USER $user

# Expose port
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
