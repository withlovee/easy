EASY
====
## Description
Click to view: 

[![Presentation](https://dl.dropboxusercontent.com/u/13791126/github_SE-Slides.jpg)](https://dl.dropboxusercontent.com/u/13791126/github_SE-Slides.pdf)

## Installation
1. Copy app/config/app.php.sample to config/app.php
2. Copy app/config/database.php.sample to config/database.php
3. Create database named **easy** with **uft8_unicode_ci** encoding
3. * Open config/database.php to edit the database settings
   ```
      'host'      => 'localhost',
      'database'  => 'easy',
      'username'  => 'root',
      'password'  => '',
   ```
4. Open Command Prompt/Terminal, cd to the directory (e.g. `cd C:\xampp\htdocs\easy`) 
  * enter `composer update` to install dependencies
  * enter `php artisan migrate` to create database tables
  * enter `php artisan db:seed` to insert some database entries (pre-population)
5. Enable Apache & MySQL and open: [http://localhost/easy/public](http://localhost/easy/public), Login using username: **admin**, password: **1234**


## Code Inspection
- `transaction.blade.php` line 30, 33: no link in `<a href=“”>`
- `AdministratorController@doLogin` line 22: move username/password query into model 
- 
## add aliases
edit
'aliases' => array(
      ...
     'Carbon' 		  => 'Carbon\Carbon',
),
in easy/app/app.php 
