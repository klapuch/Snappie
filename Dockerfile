FROM php:5.6

# PHP
RUN apt-get update -qq && apt-get install -y git sudo libcurl4-openssl-dev \
	&& apt-get install -y zlib1g-dev zip unzip && docker-php-ext-install zip

# COMPOSER
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# CLEANING
RUN apt-get clean