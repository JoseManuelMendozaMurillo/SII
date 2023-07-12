#!/bin/bash
chown -R www-data:www-data /var/www/html/
chmod -R 0777 /var/www/html/
exec "$@"