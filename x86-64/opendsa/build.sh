#!/bin/bash

echo "Cleaning out previous build..."
rm -rf export
mkdir export

echo "Rebuilding..."
docker build -t opendsa_build:latest .
docker run --rm -p 8081:80 -v $PWD/export:/tmp/export opendsa_build 
