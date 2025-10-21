FROM php:8.2-apache

# Install MySQL extensions for PHP
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    pdo_mysql \
    mysqli \
    zip \
    gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite (ถ้าต้องการ .htaccess สำหรับ library app)
RUN a2enmod rewrite

# Copy custom Apache config if needed (optional)
# COPY apache.conf /etc/apache2/sites-available/000-default.conf