#!/bin/sh
cd  /home/u511512799/public_html/ && php artisan queue:listen >> /dev/null 2>&1