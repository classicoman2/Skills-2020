#!/bin/bash

function install() {
    apt update
    apt install -y curl net-tools
    apt clean --dry-run
}

function getXampp() {
    curl -Lo /home/xampp.run https://www.apachefriends.org/xampp-files/7.4.7/xampp-linux-x64-7.4.7-0-installer.run
    chmod +x /home/xampp.run
}

function installXampp() {
    /home/xampp.run
}

install
getXampp
installXampp