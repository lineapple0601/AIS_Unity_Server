#! /bin/bash
cd bootstrap/cache
rm -rf *.php
cd ../../
######### 検証用
php artisan  view:clear
php artisan  config:clear
php artisan  config:cache
php artisan clear-compiled


