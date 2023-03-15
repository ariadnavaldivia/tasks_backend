# Tasks API

A Restful API for Tasks Challenge

## Requirements

PHP: 7.3
## Installation

Clone the project with command:

```bash
  git clone https://github.com/ariadnavaldivia/tasks_backend.git
```

Go to the project directory with command:

```bash
  cd tasks_backend
```

Install dependencies, run command:

```bash
  composer install
```
## Database and Environment Variables  

Create new database with any name.  
Create new file ".env" based on ".env.example" and set your correct database values, for example:
```bash
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tasks_db
DB_USERNAME=root
DB_PASSWORD=
```

Set API_KEY :a random string  (you can use the same one from the example):
```bash
API_KEY=6znxetj6wwu27
```

## Migrations
Run migrations and seeders, use command:

```bash
  php artisan migrate:refresh --seed
```
## Run locally

```bash
  php -S 127.0.0.1:8000 -t public
```

## Authors

- [@ariadnavaldivia](https://github.com/ariadnavaldivia)

