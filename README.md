# Restaurant Menu App

A simple app to display the menu of a restaurant. Consisted of backend and frontend. For backend, a staff or registered user can add, edit or delete a certain food from the menu. For the frontend, a visitor or unauthorized user can only view the displayed menu.

-   Laravel v8.83.18
-   Bootstrap 5

## Demo

Video: https://youtu.be/DnF_oOhXV8g

<a href="https://i.imgur.com/4jmt9AF.png" width="600px"></img></a>
<a href="https://i.imgur.com/yyyVVtV.png" width="600px"></img></a>
<a href="https://i.imgur.com/0QHbHK1.png" width="600px"></img></a>
<a href="https://i.imgur.com/7vDn9CI.png" width="600px"></img></a>
<a href="https://i.imgur.com/8JMVejx.png" width="600px"></img></a>

## Prerequisite

-   [XAMPP](https://www.apachefriends.org/download.html) / [WampServer](https://www.wampserver.com/en/download-wampserver-64bits/)
-   PHP 7.4 and above
-   [Composer](https://getcomposer.org/download/)

## Deployment

Via git:

-   Run `git clone https://github.com/ayaxxchanz/Laravel-Restaurant-App/`
-   Run `composer install` (in project directory)
-   Run `cp .env.example .env` (in project directory)
-   Open phpMyAdmin and create a new database
-   Open `.env` file and insert your database details, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
-   Run `php artisan key:generate` (in project directory)
-   Run `php artisan migrate` (in project directory)
-   Run `php artisan serve` (in project directory)

Via .zip package:

-   Extract file to desktop
-   Open phpMyAdmin and create a new database named `laravel_practice`
-   Import `database.sql` into the database
-   Run `composer install` (in project directory)
-   Run `php artisan key:generate` (in project directory)
-   Run `php artisan migrate` (in project directory)
-   Run `php artisan serve` (in project directory)
