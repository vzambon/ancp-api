FROM phpswoole/swoole:php8.2-alpine

RUN apk upgrade && apk update \
    && apk add --no-cache \
    npm \
    nodejs \
    supervisor \
    unzip \
    zlib-dev \
    libpng-dev \
    autoconf \
    gcc \
    g++ \
    make \
    wget \
    libaio \
    libnsl \
    libc6-compat \
    libzip-dev \
    libxrender \ 
    fontconfig \
    freetype \
    libxext \
    libx11 \
    supercronic

# Install PHP extensions and enable them
RUN docker-php-ext-install gd zip pcntl

# Install Oracle Client SDK v21_11
RUN cd /tmp \
    && curl -o instantclient-sdk-linux.x64-21.11.0.0.0dbru.zip https://download.oracle.com/otn_software/linux/instantclient/2111000/instantclient-sdk-linux.x64-21.11.0.0.0dbru.zip -SL \
    && unzip instantclient-sdk-linux.x64-21.11.0.0.0dbru.zip -d /usr/lib/ \
    && rm instantclient-sdk-linux.x64-21.11.0.0.0dbru.zip

ENV LD_LIBRARY_PATH="/usr/lib/instantclient_21_11"

# Install Oracle Client v21.11
RUN curl -o instantclient-basic-linux.x64-21.11.0.0.0dbru.zip https://download.oracle.com/otn_software/linux/instantclient/2111000/instantclient-basic-linux.x64-21.11.0.0.0dbru.zip -SL \
    && unzip instantclient-basic-linux.x64-21.11.0.0.0dbru.zip -d /usr/lib/ \
    && rm instantclient-basic-linux.x64-21.11.0.0.0dbru.zip \
    && ln -s /usr/lib/instantclient/libclntsh.so.21.1 /usr/lib/libclntsh.so \
    && ln -s /usr/lib/instantclient/libocci.so.21.1 /usr/lib/libocci.so \
    && ln -s /usr/lib/instantclient/libociicus.so /usr/lib/libociicus.so \
    && ln -s /usr/lib/instantclient/libnnz21.so /usr/lib/libnnz21.so \
    && ln -s /usr/lib/libnsl.so.2 /usr/lib/libnsl.so.1 \
    && ln -s /lib/libc.so.6 /usr/lib/libresolv.so.2 \
    && ln -s /lib64/ld-linux-x86-64.so.2 /usr/lib/ld-linux-x86-64.so.2

# Install OCI8 extension
RUN echo 'instantclient,/usr/lib/instantclient_21_11/' | pecl install oci8-3.3.0 \
    && echo 'extension=oci8.so' > /usr/local/etc/php/conf.d/oci8.ini

# Create cron configuration for Laravel schedules 
RUN echo "* * * * * cd /var/www && php artisan schedule:run >> /dev/null 2>&1" > /etc/crontabs/laravel-cron.txt

COPY ./supervisor.conf /etc/supervisor.conf

EXPOSE 9051

WORKDIR /var/www

# Start Supervisor when the container starts
CMD ["supervisord", "-c", "/etc/supervisor.conf"]
