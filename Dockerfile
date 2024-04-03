# Use a imagem oficial do PHP como base
FROM php:8.0-apache

# Atualize o sistema e instale as dependências necessárias
RUN apt-get update && \
    apt-get install -y \
    libicu-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    wget \
    && docker-php-ext-install \
    intl \
    pdo_mysql \
    mysqli \
    gd \
    zip \
    && a2enmod rewrite

# Instale o phpMyAdmin
RUN wget https://files.phpmyadmin.net/phpMyAdmin/5.1.1/phpMyAdmin-5.1.1-all-languages.tar.gz \
    && tar -xzvf phpMyAdmin-5.1.1-all-languages.tar.gz -C /usr/share \
    && mv /usr/share/phpMyAdmin-5.1.1-all-languages /usr/share/phpmyadmin \
    && rm phpMyAdmin-5.1.1-all-languages.tar.gz \
    && ln -s /usr/share/phpmyadmin /var/www/html/phpmyadmin

# Copie os arquivos do diretório atual para o diretório /var/www/html
COPY . /var/www/html

# Defina o diretório de trabalho como /var/www/html
WORKDIR /var/www/html

# Defina as permissões corretas para o diretório /var/www/html
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html
