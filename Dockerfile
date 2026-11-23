# Imaxe da web PHP das bibliotecas de Ribeira Alta
FROM php:8.3-apache

# Extensión para conectar con MariaDB e cartafol de datos para o contador de visitas
RUN docker-php-ext-install pdo_mysql \
 && mkdir -p /var/www/datos \
 && chown www-data:www-data /var/www/datos

# Versión da aplicación (chega dende Compose como argumento de construción)
ARG VERSION=dev
ENV APP_VERSION=${VERSION}

# O código vai DENTRO da imaxe: así a imaxe é un artefacto completo e inmutable.
# En desenvolvemento, compose.override.yaml monta o cartafol src por riba.
COPY src/ /var/www/html/
