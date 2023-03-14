# Tasks API

A Restful API for Tasks Challenge

## Requirements

PHP: 7.3
## Run Locally

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
Create new database and set your values in .env , for example:
```bash
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tasks_db
DB_USERNAME=root
DB_PASSWORD=
```

Set a random string  (you can use the same one)  to use as api-key in .env :
```bash
API_KEY=6znxetj6wwu27
```
Run migrations and seeders, use command:

```bash
  php artisan migrate:refresh --seed
```

Start the server

```bash
  php -S localhost:8000 -t public
```

