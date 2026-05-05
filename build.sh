#!/usr/bin/env bash
# exit on error
set -o errexit

echo "Running composer..."
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

echo "Building assets..."
npm install
npm run build

echo "Caching config..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Running migrations..."
php artisan migrate --force
