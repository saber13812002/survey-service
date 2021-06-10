<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Survey Service

Survey-service is a service to manage surveys in Kermany.com architecture

- this service has api to commiuncate with other microserice
- every app can get token and interact with this service

## Installation

- clone this repo
- JENKINS section (in this file)  
- composer install
- create .env file by clone .env.example
- create db and update .env

- run 
```php artisan migrate```

- run 
```php artisan key:generate```

- we should have PackageType with run:

```php artisan db:seed --class=PackageTypeSeeder```

```php artisan db:seed --class=AnswerTypeSeeder```

- run 
```php artisan serve```

- open {APP_URL}/health
- open {APP_URL}/api/docs

## for test in locahost ENV
    
- run these commands:

```php artisan migrate:refresh --seed```

```php artisan test```

```php artisan db:seed --class=PackageTypeSeeder```

```php artisan db:seed --class=AnswerTypeSeeder```

## How to test

    - open /api/docs 
    - import postman link then import it
    - run and test apis

## Description

- Campaign for marketing activities: مثال
  
  - کمپین تبلیغاتی بهار
  - کمپین تبلیغاتی سال 1400
    
- Category for report goals e.g:
  
  - روانشناسی  
  - یا سوالات رضایت مشتری 
  -    یا سوالات هوش 
  - یا سوالات دغدغه های اجتماعی

## JENKINS CI/CD

- add jenkins file into root
- install health package:
  
      composer require ukfast/laravel-health-check
    
- modify l5-swagger config file by read Readme.md file >> section [l5-sqagger]

## l5-swagger

راهنمای استقرار مستندات

openApi

سرویس‌ها در تمام محیط ها.

بعد از نصب پکیج darkaonline/l5-swagger کانفیگ زیر در فایل کانفیگ این پکیج اعمال کنید.

config/l5-swagger.php like this:

    'documentations' => [
    ...
    'routes' => [
        'api' => 'api/docs',
        'docs' => 'swagger/docs',
    ]
    ...


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
