FROM php:7.4-fpm-buster

ARG PACKAGES="jq curl wget git"
ARG DEV_PACKAGES="libmcrypt-dev libjpeg62-turbo-dev libzip-dev libbz2-dev libpng-dev libfreetype6-dev libonig-dev libcurl4-openssl-dev pkg-config libssl-dev"
ARG PECL_PACKAGES="mcrypt xdebug"
ARG PHP_EXT_PACKAGES="mysqli pdo_mysql zip bz2 mbstring gd"
ARG COLOR="\e[36m"
ARG RESET_COLOR="\e[0m"

RUN echo "${COLOR}PHP DOCKER CONTAINER${RESET_COLOR}" \
&& echo "${COLOR}Running apt update ...${RESET_COLOR}" \
&& apt-get -qq update \
&& echo "${COLOR}Running apt install for ${PACKAGES} ...${RESET_COLOR}" \
&& apt-get -q -y install --no-install-recommends ${PACKAGES} \
&& echo "${COLOR}Running apt install for ${DEV_PACKAGES} ...${RESET_COLOR}" \
&& apt-get -q -y install --no-install-recommends ${DEV_PACKAGES} \
&& echo "${COLOR}Running pecl install for ${PECL_PACKAGES}...${RESET_COLOR}" \
&& pecl install ${PECL_PACKAGES}\
&& echo "${COLOR}Running php-ext-configure gd with FreeType...${RESET_COLOR}" \
&& docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
&& echo "${COLOR}Running php-ext-install for ${PHP_EXT_PACKAGES} ...${RESET_COLOR}" \
&& docker-php-ext-install -j$(nproc) ${PHP_EXT_PACKAGES} \
&& echo "${COLOR}Running php-ext-enable for xdebug ...${RESET_COLOR}" \
&& docker-php-ext-enable xdebug \
&& echo "${COLOR}Installing composer ...${RESET_COLOR}" \
&& wget https://getcomposer.org/installer -O - -q | php -- --install-dir=/bin --filename=composer --quiet \
&& echo "${COLOR}Running apt uninstall for ${DEV_PACKAGES} ...${RESET_COLOR}" \
&& apt-get -q -y remove --purge ${DEV_PACKAGES} \
&& echo "${COLOR}Running apt clean ...${RESET_COLOR}" \
&& apt-get -q -y clean ${PACKAGES} \
&& echo "${COLOR}Configuring ...${RESET_COLOR}" \
&& echo "${COLOR}Creating /tmp/sessions directory ...${RESET_COLOR}" \
&& mkdir -m 755 /tmp/sessions \
&& chown www-data:www-data /tmp/sessions \
&& echo "${COLOR} Seting up UTC timezone ...${RESET_COLOR} " \
&& cat /usr/share/zoneinfo/Etc/UTC > /etc/localtime \
&& echo "${COLOR}DONE!${RESET_COLOR}"


