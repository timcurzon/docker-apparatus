#!/usr/bin/env bash

# Export build
cp -R /tmp/build/OpenDSA /tmp/export/OpenDSA

# Tidy up export
rm -rf /tmp/export/OpenDSA/.git

# Start basic webserver (demo build)
cd /tmp/build/OpenDSA
python server.py 0.0.0.0:80
