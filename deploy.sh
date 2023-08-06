#!/bin/bash
set -e

echo "Deploying application ..."

# Enter maintenance mode
php8.2 artisan down

# Update codebase
git pull origin main

# Install dependencies based on lock file
php8.2 /usr/local/bin/composer install --no-interaction --prefer-dist --optimize-autoloader

# Build frontend
npm run build

# Migrate database
#php8.2 artisan migrate --force

# Clear cache
php8.2 artisan optimize

# Reload PHP to update opcache
#echo "" | sudo -S service php7.4-fpm reload

# Exit maintenance mode
php8.2 artisan up

echo "🚀 Application deployed!"
