#!/usr/bin/env bash

# Start phpfpm
service php7.0-fpm start

# Run given Docker CMD
echo ">> exec docker CMD"
echo "$@"
exec "$@"
