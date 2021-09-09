#!/bin/sh

cp -rf /persistent-data/mysql /var/lib/mysql

echo "${*}"

${*}
