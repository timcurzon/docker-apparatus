#!/bin/bash

if [ "$1" = "shell" ]; then
	/bin/bash
else
	/usr/local/bin/generate-md "$@"
fi

