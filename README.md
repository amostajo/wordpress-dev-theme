# Wordpress Dev Templates Theme

The powered by [Wordpress THEME template](https://github.com/amostajo/wordpress-theme).

## Requirements

* PHP >= 5.4.0

## Installation

WPT utilizes [Composer](https://getcomposer.org/) and Bower to manage its dependencies.

You must have installed `bower` globally

```bash
npm install -g bower
```

Then run following commands

```bash
composer install
bower install
bower update
```

You need to setup your theme's name

```bash
php ayuco setname <Your Theme Name>
```

To make sure you have lastest updates on composer packages and names

```bash
composer update
```

## Coding Guidelines

The coding is a mix between PSR-2 and Wordpress PHP guidelines.

## License

This **Theme** is free software distributed under the terms of the MIT license.