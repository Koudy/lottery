#Test demonstration project

Нужно разработать веб-приложение для розыгрыша призов. После аутентификации пользователь может
нажать на кнопку и получить случайный приз. Призы бывают 3х типов: денежный (случайная сумма в
интервале), бонусные баллы (случайная сумма в интервале), физический предмет (случайный предмет из списка).
От приза можно отказаться.
Деньги и предметы ограничены, баллы лояльности нет.

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
