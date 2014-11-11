EASY
====

## Installation
1. Copy config/app.php.sample to config/app.php
2. Copy config/database.php.sample to config/database.php
  * Open config/database.php to edit the database settings
   ```
      'host'      => 'localhost',
      'database'  => 'easy',
      'username'  => 'root',
      'password'  => '',
   ```
3. Open Command Prompt/Terminal, cd to the directory (e.g. `cd C:\xampp\htdocs\easy`) 
  * enter `composer update` to install dependencies
  * enter `php artisan migrate` to create database tables
  * enter `php artisan db:seed` to insert some database entries (pre-population)
4. Enable Apache & MySQL and open: [http://localhost/easy/public](http://localhost/easy/public), Login using username: **admin**, password: **1234**
5. Done!