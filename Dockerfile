# Etapa 1: Construcción de la imagen para Laravel
FROM php:8.3.8-fpm AS base

# Instalar extensiones necesarias
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpq-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    nodejs \
    npm \
    && docker-php-ext-install pdo pdo_mysql mbstring zip bcmath gd

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos de la aplicación
COPY . .

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Instalar dependencias de npm y compilar activos
RUN npm install
RUN npm run build

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Copiar el script de entrada
COPY entrypoint.sh /usr/local/bin/entrypoint.sh

# Configurar el script como comando predeterminado
ENTRYPOINT ["sh", "/usr/local/bin/entrypoint.sh"]

RUN chmod +x /usr/local/bin/entrypoint.sh

# Configurar puerto de escucha
EXPOSE 8080

# Comando de inicio
CMD ["php-fpm"]