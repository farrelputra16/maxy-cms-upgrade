# Use PHP 8.2 CLI as the base image
FROM php:8.2-cli

# Set working directory
WORKDIR /var/www/html

# Install necessary dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libgmp-dev \
    netcat-openbsd \
    && rm -rf /var/lib/apt/lists/* # Clean up apt cache to reduce image size

# Install PHP extensions required for Laravel
RUN docker-php-ext-install -j$(nproc) \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    gmp \
    xml \
    zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# **BARU:** Salin file konfigurasi PHP kustom (uploads.ini)
# Pastikan folder docker/php dan file uploads.ini ada di root proyek Anda
COPY docker/php/uploads.ini /usr/local/etc/php/conf.d/uploads.ini

# Copy only composer.json and composer.lock first for dependency installation
# This leverages Docker's layer caching for composer install
COPY composer.json composer.lock ./

# Install Laravel dependencies, but DISABLE SCRIPTS at this stage
# Scripts will be run after all project files are copied
RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Copy the rest of the project files to the working directory (now 'artisan' is present)
COPY . .

# Manually run Composer scripts *after* all files are copied
# This ensures 'artisan' is available for scripts like package:discover
RUN composer dump-autoload --optimize && php artisan package:discover --ansi

# Expose the port for Laravel Artisan Serve
EXPOSE 8000

# Run the built-in PHP server for Laravel as the main process
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
