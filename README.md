## Laravel Admin Panel

A basic admin panel project for managing companies and their employees.

## Setup

Clone the repository.

Install app dependencies:
```docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs```

Copy example .env:
```cp .env.example .env```

Start Sail:
```./vendor/bin/sail up```

Generate app key:
```php artisan key:generate```

Migrate database:
```php artisan migrate```

Seed the database with dummy data:
```php artisan db:seed```

Launch server:
```php artisan serve```
```npm run dev```
