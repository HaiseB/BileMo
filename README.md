# BileMo
Projet 7 of the "parcours développeur d'application PHP/Symfony" by Openclassrooms.

This project consist of an api for Bilemo customers

[![Maintainability](https://api.codeclimate.com/v1/badges/bd3f6d8f94eeff4dcee1/maintainability)](https://codeclimate.com/github/HaiseB/BileMo/maintainability)

## Table of Contents
1. [Pre required](#Pre-required)
2. [Installation](#Installation)
3. [Settings](#Settings)
4. [How to use](#How-to-use)
5. [Build with](#Build-with)
6. [Author](#Author)

## Pre required
You will need to install those on your server
- *PHP* (>= 7.2.10)
- *Apache* (>= 2.4.35)
- *MySQL* (>= 5.7.23)
- *Composer* (>= 1.10.1)

## Installation

> Make sure the `public` repository, is at the root of your server, you can also create a virtual host that redirect the visitors to the `public` directory.

_Run thoses commands_

- ``git clone https://github.com/HaiseB/BileMo.git``
- ``composer install``

## Settings

- Change all default values in .env

- Create a empty database on mysql
- ``php bin/console doctrine:database:create``
- ``php bin/console doctrine:migrations:migrate``

(Optional to get fake data)
- ``php bin/console doctrine:fixtures:load``

## How to use

- To launch symfony (choose one, according to your preferences)

- ``php -S 127.0.0.1:8000 -t public``
- ``symfony serve -d``

## Build with
- [Symfony 5](https://symfony.com/) - PHP framework

### Author
* **Benjamin Haise** _alias_ [@HaiseB](https://github.com/HaiseB)
