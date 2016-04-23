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

