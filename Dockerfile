FROM  php:7.4-apache
COPY  scr_sj/ /var/www/html/
RUN echo "ServerName Localhost" >> /etc/apache2/apache2.conf
EXPOSE 80