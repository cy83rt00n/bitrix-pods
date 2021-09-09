#!/bin/sh

cp -rf /persistent-data/mysql /tmp

echo "${*}"

${*}
