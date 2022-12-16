#FUNFANDO, CONECTANDO NO SQL SERVER VIA TUNEL
#COM A DICA DO --network=host dessa pergunta no stackoverflow = https://stackoverflow.com/a/24326540
FROM php:8.1-apache
MAINTAINER Lucas Santana<lucasg4x@gmail.com>

#USER root

#WORKDIR /var/www/html

# Arguments defined in docker-compose.yml
ARG user
ARG uid

RUN apt-get update

 #libxrender1 e libfontconfig1 são para o wkhtmltopdf funcionar
RUN apt-get install -y \
        libpq-dev \
        libpng-dev \
        git \
        nano \
        gnupg \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        zip \
        curl \
        unzip \
#        libxrender1 \
#        libfontconfig1 \
        wget \
#        cron \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && docker-php-ext-install mbstring \
    && docker-php-source delete


# Instalação e configuração do XDebug
RUN pecl install xdebug && docker-php-ext-enable xdebug
COPY ./.docker/php8.ini-dev /usr/local/etc/php/php.ini

COPY ./.docker/vhost.conf /etc/apache2/sites-available/000-default.conf
RUN echo "ServerName localhost" | tee /etc/apache2/conf-available/fqdn.conf && a2enconf fqdn
RUN a2enmod rewrite

#Instalação Node
RUN apt-get update \
  && curl -fsSL https://deb.nodesource.com/setup_lts.x | bash - \
  && apt-get install -y nodejs \
  && node -v \
  && npm -v


# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www/html

USER $user

