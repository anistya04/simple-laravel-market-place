<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project
This entry test project was built using `laravel 8`.

NOTE:
1. Verification user will be sent after user register.
2. Some APIs are only accessible when the user is verified.
 
# Getting Started

This is an example of how you may give instructions on setting up your project locally.
To get a local copy up and running follow these simple example steps.

NOTE: Base URL API use Grouping `/api`. Example : `http://127.0.0.1:8000/api`

## Prerequisites software

List software that you need : 
1. Mysql 8.*
2. Php 8.1.*
3. git
4. composer

## Instalation 

1. Copy `.env.example` file to `.env`

2. For example you can set `.env` below to configure your database (adjust configuration to your localhost) and smtp :
```
DB_DATABASE=market-place
DB_USERNAME=root
DB_PASSWORD=

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=anistyadwisetiawan04@gmail.com
MAIL_PASSWORD=thsqvituebzmjiyr
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=anistyadwisetiawan04@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

3. Run the following command to install dependecy library:
```
composer install
```
## Running Project
Run the following command :
```
php artisan migrate:fresh --seed
```
```
php artisan serve
```
4. Generate Jwt Secret: 
```
php artisan jwt:secret
```

## Test API
This is an example of postman collection: [Download Collection Here](https://drive.google.com/file/d/1rJXa48TfjP3SwEv6LxkDcAMlA3RJHtdi/view?usp=sharing)
