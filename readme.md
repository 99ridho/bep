## Badminton Event Platform

### Development

```
$ git clone https://github.com/99ridho/bep.git
$ cp .env.example .env
$ composer install
$ php artisan key:generate
$ php artisan serve
```

### Database

Change to `.env`

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=bep
DB_USERNAME=bep
DB_PASSWORD=bep
```
