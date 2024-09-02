FROM base:latest AS setup

FROM php:8.3-fpm AS php

ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    wget \
    zsh

ENV SHELL=/bin/zsh

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath sockets

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Get utilitaries for develop environment
COPY --from=setup /root/. /home/$user/
COPY --from=setup /usr/local/bin/starship /usr/local/bin/starship

# Create system user to run Composer
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
chown -R $user:$user /home/$user


RUN pecl install xdebug \
&& docker-php-ext-enable xdebug


USER $user