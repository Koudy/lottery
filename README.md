#Test demonstration project

We need to develop a web application for a prize draw. After authentication, the user can click a button and get a random prize. There are 3 types of prizes: money (random amount in the interval), bonus points (random amount in the interval), a physical item (random item from the list). The prize can be refused. Money and items are limited, loyalty points are not.

## Getting Started
Clone project:
```
git clone https://github.com/Koudy/lottery.git
```

Copy and rename access.log.dist and error.log.dist:
```
cp logs/nginx/access.log.dist logs/nginx/access.log
cp logs/nginx/error.log.dist logs/nginx/error.log
```
Add lottery.docker into your hosts file:
```
127.0.0.1 lottery.docker
```

Run container:
```
docker-compose up
```

Go into a container fpm(use sh, not bash) and install dependencies:
```
composer install
```

Run migrations:
```
php bin/console doctrine:migrations:migrate
```

Load fixture
```
php bin/console doctrine:fixtures:load
```

Go to the lottery.docker and authorize with:
```
Login: Some user name
passowrd: the_new_password
```

Get your prize!

## Db connection
```
HOST: localhost
PORT: 49198
DB: postgres
POSTGRES_USER: main
POSTGRES_PASSWORD: main
```

## Run test
```
vendor/bin/phpunit ./tests/
```
