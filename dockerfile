FROM php:8.2.6-apache

# Actualizamos la lista de paquetes disponibles
RUN apt-get update

# Nos aseguramos de que el paquete esté disponible
RUN apt-get install --reinstall -y locales

# descomentamos la locale que vamos a utilizar
RUN sed -i 's/# es_MX.UTF-8 UTF-8/es_MX.UTF-8 UTF-8/' /etc/locale.gen

# Generamos la locale elegida
RUN locale-gen es_MX.UTF-8

# seteamos las environment variables
ENV LANG es_MX.UTF-8
ENV LANGUAGE es_MX
ENV LC_ALL es_MX.UTF-8

# Verificamos la configuración actualizada
RUN dpkg-reconfigure --frontend noninteractive locales


# Instalamos la biblioteca libzip
RUN apt-get update && apt-get install -y --no-install-recommends \
        libzip-dev \
        && rm -rf /var/lib/apt/lists/*


# Intalamos las librearías de php que necesitaremos
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    p7zip-full \
    && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install zip

RUN apt-get update && apt-get install -y libonig-dev && docker-php-ext-install mbstring

RUN apt-get update \
    && apt-get install -y libfreetype6-dev libjpeg-dev libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

RUN apt install -y libicu-dev \
    && docker-php-ext-install -j$(nproc) intl

RUN apt install -y libxml2-dev \
    && docker-php-ext-install xml

RUN apt install -y libcurl3-dev \
    && docker-php-ext-install curl

RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo 
RUN docker-php-ext-install pdo_mysql 
RUN docker-php-ext-install iconv


# Instalamos y configuramos una herramienta para enviar correos
# Instalar msmtp
RUN apt-get update && apt-get install -y msmtp
# Configurar msmtp
RUN { \
    echo "defaults"; \
    echo "auth           on"; \
    echo "tls            on"; \
    echo "tls_trust_file /etc/ssl/certs/ca-certificates.crt"; \
    echo "logfile        ~/.msmtp.log"; \
    echo "account        gmail"; \
    echo "host           smtp.gmail.com"; \
    echo "port           587"; \
    echo "from           ocotlan.tecnm@gmail.com"; \
    echo "user           ocotlan.tecnm@gmail.com"; \
    echo "password       idikrthhmieukihz"; \
    echo "account default : gmail"; \
} > /etc/msmtprc


# Creamos un certificado SSL 
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
   -keyout /etc/ssl/private/apache-selfsigned.key \
   -out /etc/ssl/certs/apache-selfsigned.crt \
   -subj "/C=MX/ST=Jalisco/L=Ocotlan/O=Instituto Tecnologico de Ocotlan/OU=SII/CN=localhost"

# Edita la configuración de Apache para habilitar SSL
RUN sed -i 's/ssl-cert-snakeoil.pem/apache-selfsigned.crt/' /etc/apache2/sites-available/default-ssl.conf \
    && sed -i 's/ssl-cert-snakeoil.key/apache-selfsigned.key/' /etc/apache2/sites-available/default-ssl.conf \
    && a2ensite default-ssl.conf


# Instalamos composer
RUN apt-get update && apt-get install -y --no-install-recommends \
        git \
        && rm -rf /var/lib/apt/lists/*
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN php -r "unlink('composer-setup.php');"

# Añadimos /usr/local/bin a la variable de entorno PATH
ENV PATH=$PATH:/usr/local/bin


# Limpiamos la cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*


# Habilitamos el modulo rewrite en la configuración de apache
RUN a2enmod rewrite

# Habilita el módulo SSL
RUN a2enmod ssl


# Damos permisos de escritura en las carpetas
COPY ./scripts/start-script.sh /start-script.sh
RUN chmod +x /start-script.sh
ENTRYPOINT ["/start-script.sh"]
CMD ["apache2-foreground"]

# Reinicia Apache para aplicar los cambios
RUN apache2ctl restart

COPY . /var/www/html/

EXPOSE 443