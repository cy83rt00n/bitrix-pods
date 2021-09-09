#!/bin/bash

set -e

chown www-data /proc/self/fd/2

lighttpd -D -f /etc/lighttpd/lighttpd.conf
