#!/bin/bash

echo "Cleaning out previous export..."
rm -rf export
mkdir export

echo "Building..."
docker build -t opendsa_build:latest .
docker run --rm -d -p 8081:80 -v $PWD/export:/tmp/export opendsa_build

printf "\nNOTICE! Build container is running in background, and will begin to serve build at http://localhost:8081 shortly...\n\n"
