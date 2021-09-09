FROM debian:buster-slim

COPY dist /tmp/bitrix-core
COPY volumes/etc/lsyncd /etc/lsyncd
COPY volumes/docker-entrypoint.sh /docker-entrypoint.sh

RUN apt-get update \
&& apt-get install --yes lsyncd \
&& chmod +x /docker-entrypoint.sh \
# && mkdir /tmp/bitrix-core \
&& chgrp -Rf www-data /tmp/bitrix-core \
&& chmod -Rf g+rwx /tmp/bitrix-core \
&& mkdir -p /persistent-data/bitrix-core \
&& chgrp -Rf www-data /persistent-data/bitrix-core \
&& chmod -Rf g+rwx /persistent-data/bitrix-core \
&& apt-get clean autoclean \
&& apt-get autoremove --yes

USER www-data

CMD ["lsyncd", "/etc/lsyncd/lsync.json"]

ENTRYPOINT ["/docker-entrypoint.sh"]
