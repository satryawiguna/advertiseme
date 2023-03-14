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

## Do some adjustment to .env file configuration value
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

Run for local server
```
$ ./vendor/bin/sail php artisan serve
$ ./vendor/bin/sail npm run dev
$ ./vendor/bin/sail php artisan websocket:server
```

Let's jump to the browser then hit url and do register at the first time to have get an access into dashboard
```
http://localhost/
```

Find the video screens within
```
screencast-localhost-2023.03.14-15_27_37.webm
screencast-localhost-2023.03.14-23_05_07.webm
```
## Video Screens
Drag and Drop Image / Text ELement
[screencast-localhost-2023.03.14-15_27_37.webm](https://user-images.githubusercontent.com/18078335/225052954-785dd511-5154-419a-b3be-15d8e6bb3ea4.webm)

Realtime update process
[screencast-localhost-2023.03.14-23_05_07.webm](https://user-images.githubusercontent.com/18078335/225053759-ed4541fc-73e9-48aa-a2e9-d52efced9793.webm)
