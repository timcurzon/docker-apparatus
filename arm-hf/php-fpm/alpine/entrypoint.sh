#!/usr/bin/env bash

CMD=$(which "$1")

if [ $? == '0' ]; then
  shift
  exec tini -sg -- "$CMD" "$@"
else
  echo "Command not found: $1"
  exit 1
fi
