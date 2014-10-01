#!/bin/sh

echo "drop database if exists ecg; create database ecg DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;" | /usr/bin/mysql -uroot -pmysql
php 8thcross_xml2db.php
