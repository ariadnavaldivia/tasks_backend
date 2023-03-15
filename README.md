# Tasks API

A Restful API for Tasks Manager. This is a Lumen project.

##Instructions

###  1. Requirements

Use PHP: 7.3

### 2. Installation

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
### 3. Database and Environment Variables  

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

### 4. Migrations
Run migrations and seeders, use command:

```bash
  php artisan migrate:refresh --seed
```
### 5. Run locally
The API runs on http://127.0.0.1:8000
```bash
  php -S 127.0.0.1:8000 -t public
```

## Endpoints:
- POST /api/tasks/list
- POST /api/tasks/get-task
- POST /api/tasks/create
- POST /api/tasks/update
- POST /api/tasks/delete
[Postman Collection here](https://api.postman.com/collections/6885556-b2033348-3241-4f3a-ac84-10d9400ebb5e?access_key=PMAT-01GVJ0P00DMMMTPZ8GN7C4GV8X)


## Authors

- [@ariadnavaldivia](https://github.com/ariadnavaldivia)
