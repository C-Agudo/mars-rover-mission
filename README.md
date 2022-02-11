## Mars Rover Mission

#Instalation

First of all can clone the project here:

https://github.com/C-Agudo/mars-rover-mission.git

Application is dockerized, so after clone can run:

    <code>docker-compose build</code>

    <code>docker-compose up -d</code>

Can build database from artisan migrate

    <code>docker exec php php artisan migrate</code>

Even seed tables

    <code>docker exec php php artisan db:seed</code>

Exist 1 front view to interact with backend in the localhost:

    localhost:8080

More detail of application is detailed in documentation folder. 
It have pdf documentation and postman api doc.
