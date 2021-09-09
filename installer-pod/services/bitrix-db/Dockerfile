FROM debian:buster-slim

COPY volumes/etc/lsyncd /etc/lsyncd
COPY volumes/docker-entrypoint.sh /docker-entrypoint.sh

RUN apt-get update \
&& apt-get install --yes lsyncd \
&& chmod +x /docker-entrypoint.sh \
&& mkdir /tmp/mysql \
&& mkdir -p /persistent-data/mysql \
&& apt-get clean autoclean \
&& apt-get autoremove --yes

CMD ["lsyncd", "/etc/lsyncd/lsync.json"]

ENTRYPOINT ["/docker-entrypoint.sh"]
