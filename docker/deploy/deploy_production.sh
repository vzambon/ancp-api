#!/bin/sh

set -e

export CONF_TEMPLATE='/nginx/app.conf.template'

echo "Executing deploy.sh..."

./set_storage.sh

docker compose up -d --build --force-recreate

# Wait for the Oracle Database container to be ready
until docker compose logs mysql | grep -q "ready for connections"; do
    echo "Waiting Database setup...${counter}s"
    sleep 5
    counter=$((counter + 5))
done
echo "Database is ready to use after $counter seconds."

docker compose cp .env laravel:/var/www/
docker compose exec -t laravel composer install
docker compose exec -t laravel npm install
docker compose exec -t laravel php artisan key:generate
docker compose exec -t laravel php artisan migrate --force
docker compose restart laravel

echo "Finished deploy.sh!"