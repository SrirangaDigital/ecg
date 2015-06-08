#!/bin/sh

host="localhost"
db="ecg"
usr="root"
pwd='mysql'

echo "DROP DATABASE IF EXISTS $db;" | /usr/bin/mysql -u$usr -p$pwd
echo "CREATE DATABASE IF NOT EXISTS $db CHARACTER SET utf8 COLLATE utf8_general_ci;" | /usr/bin/mysql -u$usr -p$pwd

perl insert_photo.pl $host $db $usr $pwd
perl insert_artist.pl $host $db $usr $pwd
perl insert_events.pl $host $db $usr $pwd
