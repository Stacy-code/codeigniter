# CodeIgniter 4 Application

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](http://codeigniter.com).

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)

## Setup
>You must complete the following steps to initialize the project.

Run command in you domain root

`git clone https://github.com/Stacy-code/codeigniter.git .`

## Update composer dependence
`composer update`

## Application settings
Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Running migrations
`php spark migrate`

## Running seeders
+ `composer dump-autoload`
+ `php spark db:seed UsersSeeder`
+ `php spark db:seed CategorySeeder`

## Default admin account
+ `Email: admin@email.com`
+ `Pass: admin`

## Prerequisites to compile themes
>+ Make sure to have the ***Node.js*** installed & running in your computer.
   If you already have installed nodejs on your computer, you can skip this step
>+ Make sure to have the ***Gulp*** installed & running in your computer.
   If you already have installed gulp on your computer, you can skip this step.
   In order to install, just run command `npm install -g gulp` from your terminal.

## Compiling admin theme
+ `cd resources/themes/ui`
+ `npm install`
+ `gulp build`