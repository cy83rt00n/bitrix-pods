#!/bin/sh

# echo "${1}"
# whoami

cp -rf /persistent-data/bitrix-core /tmp
# ln -s /persistent-data/bitrix-core /tmp/bitrix-core

# /usr/bin/tail -f /dev/null

${*}
