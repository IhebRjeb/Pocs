FROM php:8.1-cli
# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# Install Redis with PECL and enable the extension
RUN pecl install redis
RUN docker-php-ext-enable redis
WORKDIR /app
