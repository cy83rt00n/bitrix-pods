FROM mysql:5.7

ARG PROJECT_DB_NAME

ARG PACKAGES="curl"
ARG COLOR="\e[36m"
ARG RESET_COLOR="\e[0m"
ARG CUSTOM_CONFIG_PATH=volumes/etc/mysql/conf.d
ARG CUSTOM_CONFIG=custom.cnf

USER root

COPY ${CUSTOM_CONFIG_PATH}/${CUSTOM_CONFIG} /etc/mysql/conf.d/${CUSTOM_CONFIG}

RUN echo "${COLOR}MYSQL DOCKER CONTAINER${RESET_COLOR}" \
&& echo "${COLOR}Running apt update ...${RESET_COLOR}" \
&& apt-get -qq update \
&& echo "${COLOR}Running apt install for ${PACKAGES} ...${RESET_COLOR}" \
&& apt-get -qq -y install --no-install-recommends ${PACKAGES} \
&& echo "${COLOR} Seting up UTC timezone ...${RESET_COLOR} " \
&& cat /usr/share/zoneinfo/Etc/UTC > /etc/localtime \
&& echo "${COLOR}Running apt uninstall for ${PACKAGES} ...${RESET_COLOR}" \
&& apt-get -q -y remove --purge ${PACKAGES} \
&& echo "${COLOR}Running apt clean ...${RESET_COLOR}" \
&& apt-get -q -y clean ${PACKAGES} \
&& echo "${COLOR}Configuring ...${RESET_COLOR}" \
&& chmod 644 /etc/mysql/conf.d/${CUSTOM_CONFIG} \
&& echo "${COLOR}DONE!${RESET_COLOR}"
