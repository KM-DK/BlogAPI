# BlogAPI
Web application to create blogs - API

# Required packages

- PHP 8.0
- Composer 2.1.3
- Laravel 8.0
- PostgresSQL

# Installation

All required software can be download from the offical sites:
- PHP https://www.php.net/downloads.php for Windows and Linux OS
- Composer https://getcomposer.org/download/

If you are Windows user you can also download above softwares by Chocolatey Package Manager https://chocolatey.org/ it will automaticaly adds them to system evinorments variables.

Laravel:  
Composer automaticly can create Laravel project by use `composer create-project laravel/laravel <project-name>` command, so you don't need to install Laravel by yourself. You need to only put or uncomment in your php.init file two extensions which are used by Laravel packages: `fileinfo` and `mbstring` also, you can unlock `openssl` extension if composer required it. 