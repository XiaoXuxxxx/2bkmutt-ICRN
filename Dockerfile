FROM php:7.4-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:2.2.23 /usr/bin/composer /usr/bin/composer

# Create a non-root user and set up permissions
ARG USER=user
ARG UID=1000
RUN useradd -u $UID -m $USER \
    && mkdir -p /var/www \
    && chown -R $USER:$USER /var/www

# Set working directory and permissions
WORKDIR /var/www

# Switch to the non-root user
USER $USER

# Copy application code and install dependencies
COPY --chown=$USER:$USER ./ ./
RUN composer install

# Ensure correct permissions for logs and cache directories
USER root
RUN mkdir -p /var/www/storage/logs \
    && chown -R $USER:$USER /var/www/storage \
    && chmod -R 775 /var/www/storage

# Switch back to the non-root user
USER $USER

# Expose port 9000 and start PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]
