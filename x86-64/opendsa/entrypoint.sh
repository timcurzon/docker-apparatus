#!/usr/bin/env bash

# Export build
cp -R /tmp/build/OpenDSA /tmp/export/OpenDSA

# Start basic webserver (demo build)
cd /tmp/build/OpenDSA
python server.py 0.0.0.0:80
