Next-Basket Microservices

To get the microservices up and running, follow these steps:
User Service

    Open a terminal in the project directory.
    Navigate to the user-service directory by running:

    bash

cd user-service/

Copy .env.example to .env. Ensure to set the RABBITMQ_PASSWORD to your correct password, and also set other RABBITMQ_* config values.
Create a Docker network named registration by running:

bash

docker network create registration

Drop previous containers, rebuild, and re-run them in detached mode by executing:

bash

docker-compose down && docker-compose build --no-cache && docker-compose up -d

Once the container is up and running, enter the Laravel app by running:

bash

docker exec -it user_app /bin/bash

Inside the Laravel app, run the following commands:

bash

    php artisan test
    php artisan migrate
    php /var/www/artisan queue:work --verbose --tries=3 --timeout=180

Notification Service

    Open another terminal in the project directory.
    Navigate to the notification-service directory by running:

    bash

cd notification-service/

Copy .env.example to .env. Ensure to set the RABBITMQ_PASSWORD to your correct password, and also set other RABBITMQ_* config values.
Drop previous containers, rebuild, and re-run them in detached mode by executing:

bash

docker-compose down && docker-compose build --no-cache && docker-compose up -d

Once the container is up and running, enter the Laravel app by running:

bash

docker exec -it notification_app /bin/bash

Inside the Laravel app, run the following command to activate the queue worker:

bash

    php /var/www/artisan queue:work --verbose --tries=3 --timeout=180

Once these configurations are set, proceed to Postman (or any client of your choice) to make the appropriate POST request to 127.0.0.1:8080/api/users with sample data like {"email","firstName","lastName"}.
