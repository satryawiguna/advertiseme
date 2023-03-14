# Advertise Me

## Project setup
Create your local project root folder
```
$ mkdir advertiseme && cd advertiseme
```
Get clone project source
```
$ git clone https://github.com/satryawiguna/advertiseme.git . -b develop
```

## Do some adjust to .env file configuration value
```
APP_ENV=production
APP_URL=http://localhost/

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=advertiseme
DB_USERNAME=sail
DB_PASSWORD=password

PUSHER_APP_ID=advertimeme
PUSHER_APP_KEY=cmtCeHY2JjBtTWg4
PUSHER_APP_SECRET=M0B6VjIzdjQ1SiohZWcwTDkqZW4=
PUSHER_HOST=localhost
PUSHER_PORT=6001
PUSHER_SCHEME=http
PUSHER_APP_CLUSTER=mt1
```

### Compiles and hot-reloads for development
Make sure you have installed docker in your local. Do in your root project folder
```
$ ./vendor/bin/sail up
```
Run composer to install the packages
```
$ ./vendor/bin/sail composer install
```
Run npm to install node packages (Be sure to use node version 16)
```
$ ./vendor/bin/sail npm install
```
Run some artisan commands
```
$ ./vendor/bin/sail php artisan key:generate
$ ./vendor/bin/sail php artisan migrate
```
Run server
```
$ ./vendor/bin/sail php artisan serve
$ ./vendor/bin/sail npm run dev
$ ./vendor/bin/sail php artisan websocket:server
```
Hit the url through browser then do register frist to have access into dashboard
```
http://localhost/
```


Find the video screen within
```
screencast-localhost-2023.03.14-15_27_37.webm
screencast-localhost-2023.03.14-23_05_07.webm
```
