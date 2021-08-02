# BlogAPI
Web application to create blogs - API

# Required packages

- PHP 8.0
- Composer 2.1.3
- Laravel 8.0
- PostgreSQL

# Installation

All required software can be downloaded from the official sites:
- PHP https://www.php.net/downloads.php for Windows and Linux OS
- Composer https://getcomposer.org/download/

If you are Windows user you can also download above software by Chocolatey Package Manager https://chocolatey.org/ it will automatically add them to system environments variables.

Laravel:  
Composer automatically can create Laravel project by use `composer create-project laravel/laravel <project-name>` command, so you don't need to install Laravel by yourself. You need to only put or uncomment in your php.ini file two extensions which are used by Laravel packages: `fileinfo` and `mbstring` also, you can unlock `openssl` extension if composer required it.  

This project is already created, so you only need to download all dependencies which you can find in composer.json file. To download dependencies, use `composer update` command.

PostgreSQL:  
You can download it from here: https://www.postgresql.org/download/. It should install PostgreSQL server.
You can also download PgAdmin - GUI for Postgre https://www.pgadmin.org/download/.

# Environment variables

After download all required software, you need to make your own copy of `.env.example` file. Name it `.env`. This file contains all yours local variables for the project.

Variables to set:  
- Database(DB_):  
If you use PostgreSQL, probably you don't need to change them. Just make sure you named your db as in `.env.exaple` file, and you have the same username and password. You can check if db connection work using command 
`php artisan migrate:install`. After it, you should have a database table named migrations in your database. If not, you should check if you don't have comment `extension=pdo_pgsql`, `extension=pgsql` and `extension=curl`  in your php.ini file.

- Swagger  

    L5_SWAGGER_GENERATE_ALWAYS - default is set to true. It is auto generate swagger docs, otherwise you must use the php artisan l5-swagger:generate command to generate newly added documentation. If you don't know how to documents models and controllers with swagger you can check it under these links:  
    - https://github.com/zircote/swagger-php/tree/master/Examples/petstore.swagger.io
    - https://zircote.github.io/swagger-php/#links 

    You can view swagger auto generated docs by passing \<host>:\<port>/api/docs into your web browser. By default host is localhost and port is 8000.

# Dev tools

- Laravel Debugbar (https://github.com/barryvdh/laravel-debugbar). It works only when in .env `APP_DEBUG=true`.

# Environment variables

- Laravel Query Detector (https://github.com/beyondcode/laravel-query-detector)
