## Laravel Admin Panel

A basic admin panel project for managing companies and their employees.

## Setup

Clone the repository.

Install app dependencies:
Run ```docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs```

Copy example .env:
Run ```cp .env.example .env```

Start Sail:
Run ```./vendor/bin/sail up```

Generate app key:
Run ```php artisan key:generate```

Migrate database:
Run ```php artisan migrate```

Launch server:
Run ```php artisan serve```
Run ```npm run dev```
