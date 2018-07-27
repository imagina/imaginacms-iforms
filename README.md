# Imagina Forms

## Installation

```
composer require imagina/iforms-module

php artisan module:migrate Iforms
```

## Laravel 5

### Setup

**_NOTE_** This package supports the auto-discovery feature of Laravel 5.5, So skip these `Setup` instructions if you're using Laravel 5.5.

In `app/config/app.php` add the following :

1- The ServiceProvider to the providers array :

```php
Anhskohbo\NoCaptcha\NoCaptchaServiceProvider::class,
```

2- The class alias to the aliases array :

```php
'NoCaptcha' => Anhskohbo\NoCaptcha\Facades\NoCaptcha::class,
```

3- Publish the config file

```ssh
php artisan vendor:publish --provider="Anhskohbo\NoCaptcha\NoCaptchaServiceProvider"
```

### Configuration

Add `NOCAPTCHA_SECRET` and `NOCAPTCHA_SITEKEY` in **.env** file :

```
NOCAPTCHA_SECRET=secret-key
NOCAPTCHA_SITEKEY=site-key
```

(You can obtain them from [here](https://www.google.com/recaptcha/admin))

### Usage


With default options :

```php 
 {!! iform(form_id,'view')!!}
```

```php
 {!! iform(1,'iforms::frontend.horizontal-boostrap4.form) !!}
```


## Contribute

https://github.com/imagina/asgardcms-iforms/pulls

