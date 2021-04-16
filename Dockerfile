# Comandos para poder ensamblar la imagen en el contenedor del microservicio
FROM  php:7.4-apache
COPY  scr_sj/ /var/www/html/
RUN echo "ServerName Localhost" >> /etc/apache2/apache2.conf
RUN docker-php-ext-install mysqli
EXPOSE 80