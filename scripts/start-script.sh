#!/bin/bash
chown -R www-data:www-data /var/www/html/
chmod -R u+w /var/www/html/
exec "$@"