# laravel-books-api

Books API Built in Laravel 5 and using AngularJS for front-end

### Create Laravel 5 project with the following command:

```shell
composer create-project laravel/laravel ~/projects/github/bitclaw/laravel-books-api
php artisan ide-helper:generate
```

### Commands to get database and migrations setup

```shell
mysql> CREATE DATABASE `books-api` /*!40100 COLLATE 'utf8_general_ci' */;

php artisan migrate:install
php artisan make:migration create_books_table
php artisan migrate
```

### Create controller

```shell
php artisan make:controller Books
```

### Create model

```shell
php artisan make:model Book
```

### Use built-in web server for Laravel App (http://localhost:8000)

```shell
php artisan serve --port=8000
```

### Elixir and Gulp

When making changes to JS files , run gulp in order to get the latest changes in the front-end assets

```shell
gulp
```

### Books API Endpoint

http://localhost:8000/api/v1/books


