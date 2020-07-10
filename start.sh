#!/bin/bash

if [ ! -f "/opt/lampp/xampp" ]; then
    /home/installer.sh
fi

/opt/lampp/xampp start
tail -f /dev/null