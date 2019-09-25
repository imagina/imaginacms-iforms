## Imagina Forms | 4.0.0
##### By Imagina Soluciones Web

### Installation

`` composer require imagina/iforms-module ``

### Configuration

This module require ``maatwebsite/excel``

The ``Maatwebsite\Excel\ExcelServiceProvider`` is auto-discovered and registered by default.
If you want to register it yourself, add the ServiceProvider in config/app.php:

```php
'providers' => [
    /*
     * Package Service Providers...
     */
    Maatwebsite\Excel\ExcelServiceProvider::class,
]
```

The Excel facade is also auto-discovered.
If you want to add it manually, add the Facade in config/app.php:

```php
'aliases' => [
    ...
    'Excel' => Maatwebsite\Excel\Facades\Excel::class,
]
```

To publish the config, run the vendor publish command:
```
php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider"
```
This will create a new config file named config/excel.php.

> data source [maatwebsite/excel](https://docs.laravel-excel.com/3.1/getting-started/installation.html)

### End Points
  | PATH | METHODS |
  | ------------- | ------------- | 
  | /iform/v4/forms | [GET, POST, PUT, DELETE] |
  | /iform/v4/fields | [GET, POST, PUT, DELETE] |
  | /iform/v4/types | [GET] |
  | /iform/v4/leads | [GET, POST] |

