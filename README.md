# Laravel Beam

[![Latest Version on Packagist](https://img.shields.io/packagist/v/justijndepover/laravel-beam.svg?style=flat-square)](https://packagist.org/packages/justijndepover/laravel-beam)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/justijndepover/laravel-beam.svg?style=flat-square)](https://packagist.org/packages/justijndepover/laravel-beam)

Easily scaffold a clean Laravel application with all the necessary code

## Caution

This application is still in development and could implement breaking changes. Please use at your own risk.

## Installation

You can install the package with composer

```sh
composer require justijndepover/laravel-beam
```

After installation you should run the install command

```sh
php artisan beam:install
```

# Todo's

```
beam:install
```

-   generate models folder
-   generate resources
    -   install npm
    -   install tailwindcss
    -   install vue
-   make admin routes file
-   bind the admin routes file in the RouteServiceProvider
-   multi language
-   copy languages
-   deployer file
-   auth setup

```
beam:module
```

-   generate model
-   generate Admin controller
-   generate view files
-   ask questions like: model name, fields, migrations
-   make the module available in the admin layout navigation

## Security

If you find any security related issues, please open an issue or contact me directly at [justijndepover@gmail.com](justijndepover@gmail.com).

## Contribution

If you wish to make any changes or improvements to the package, feel free to make a pull request.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
