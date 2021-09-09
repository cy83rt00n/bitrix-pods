FROM debian:buster-slim

ARG PACKAGES="lighttpd curl"
ARG COLOR="\e[36m"
ARG RESET_COLOR="\e[0m"

COPY ./volumes/entrypoint.sh /entrypoint.sh

RUN echo "${COLOR}LIGHTTPD DOCKER CONTAINER${RESET_COLOR}" \
&& echo "${COLOR}Running apt update ...${RESET_COLOR}" \
&& apt-get -qq update \
&& echo "${COLOR}Running apt install for ${PACKAGES} ...${RESET_COLOR}" \
&& apt-get -qq -y install --no-install-recommends ${PACKAGES} \
&& echo "${COLOR}Configuring ...${RESET_COLOR}" \
&& mkdir /var/www/lighttpd \
&& chown www-data /proc/self/fd/2 /var/www/lighttpd /var/cache/lighttpd/compress /var/cache/lighttpd/uploads \
&& chmod +x /entrypoint.sh \
&& echo "${COLOR} Seting up UTC timezone ...${RESET_COLOR} " \
&& cat /usr/share/zoneinfo/Etc/UTC > /etc/localtime \
&& echo "${COLOR}Running apt clean ...${RESET_COLOR}" \
&& apt-get -q -y clean ${PACKAGES} \
&& echo "${COLOR}DONE!${RESET_COLOR}"

ENTRYPOINT ["/entrypoint.sh"]

CMD ["lighttpd", "-D", "-f", "/etc/lighttpd/lighttpd.conf"]
