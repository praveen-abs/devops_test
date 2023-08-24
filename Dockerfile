# Use the official PHP image for Laravel
FROM php:8.1.17-fpm as backend

WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy Laravel application files
COPY . .


# Install Laravel dependencies
RUN composer install

# Use the official Node.js image for building Vue.js
FROM node:18 as frontend

WORKDIR /app

# Copy Vue.js frontend
# Copy frontend files
COPY resources/js ./resources/js
COPY resources/scss ./resources/scss
COPY vite.config.js .
COPY package.json .
COPY package-lock.json .

# Install Vue.js dependencies
RUN npm install

# Build Vue.js assets
RUN npm run build

# Use the official Nginx image for serving
FROM nginx:1.21

# Remove default Nginx configuration
RUN rm /etc/nginx/conf.d/default.conf

# Copy your custom Nginx configuration
# COPY nginx/default.conf /etc/nginx/conf.d/

# Copy Laravel files from the backend stage
COPY --from=backend /var/www/html /var/www/html

# Copy Vue.js assets from the frontend stage
COPY --from=frontend /app/dist /usr/share/nginx/html

EXPOSE 80
