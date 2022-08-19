#!/bin/sh

echo "Putting the website into maintenance mode..."
php artisan down

echo "Running composer..."
rm -rf ./vendor
/opt/cpanel/composer/bin/composer install --optimize-autoloader --no-dev

echo "Linking storage..."
php artisan storage:link

echo "Generate API documents..."
php artisan l5-swagger:generate

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Caching views..."
php artisan view:cache

echo "Running migrations..."
php artisan migrate --force

echo "Putting the website back online..."
php artisan up
