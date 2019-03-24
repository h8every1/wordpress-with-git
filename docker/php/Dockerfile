FROM php:7.1-fpm

ARG WITH_XDEBUG=false

COPY ./local.ini /usr/local/etc/php/conf.d/local.ini

# Install dependencies
RUN apt-get update && apt-get -y --no-install-recommends install \
    libpng-dev \
    libjpeg-dev \
    libzip-dev \
    zip \
    vim \
    unzip \
    git \
    wget \
    curl

# Use the default production configuration
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

# Install extensions
RUN docker-php-ext-configure gd --with-gd --with-png-dir=/usr/include/ --with-jpeg-dir=/usr/include/
# --with-freetype-dir=/usr/include/
RUN docker-php-ext-install gd
RUN docker-php-ext-install zip
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install opcache


# set recommended PHP.ini settings
# see https://secure.php.net/manual/en/opcache.installation.php
RUN { \
		echo 'opcache.memory_consumption=128'; \
		echo 'opcache.interned_strings_buffer=8'; \
		echo 'opcache.max_accelerated_files=4000'; \
		echo 'opcache.revalidate_freq=2'; \
		echo 'opcache.fast_shutdown=1'; \
		echo 'opcache.enable_cli=1'; \
	} > /usr/local/etc/php/conf.d/opcache-recommended.ini

RUN if [ $WITH_XDEBUG = "true" ] ; then \
        pecl install xdebug; \
        docker-php-ext-enable xdebug; \
        { \
        echo "zend_extension=xdebug.so"; \
        echo "error_reporting = E_ALL"; \
        echo "display_startup_errors = On"; \
        echo "display_errors = On"; \
        echo "xdebug.remote_enable=1"; \
        echo "xdebug.remote_autostart=0"; \
        #echo "xdebug.remote_handler=0"; \
        echo "xdebug.idekey=docker"; \
        } > /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini; \
fi

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Set working directory
WORKDIR /var/www/html
