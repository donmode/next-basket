#!/bin/bash

/usr/local/bin/composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --ignore-platform-reqs


role=${CONTAINER_ROLE:-app}

if [ "$role" = "app" ]; then
    php artisan optimize
    php artisan config:clear
    php artisan serve --port=$PORT --host=0.0.0.0 --env=.env &
    sleep 5
    exec docker-php-entrypoint "$@"
elif [ "$role" = "queue" ]; then
    echo "Running the queue ... "
    php /var/www/artisan queue:work --verbose --tries=3 --timeout=180
fi