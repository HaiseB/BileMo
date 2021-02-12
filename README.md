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
- *PHP* (>= 7.3)
- *Apache* (>= 2.4)
- *MySQL* (>= 5.7)
- *Composer* (>= 2.0)
- *OpenSSL*

## Installation

> Make sure the `public` repository, is at the root of your server, you can also create a virtual host that redirect the visitors to the `public` directory.

_Run thoses commands_

- ``git clone https://github.com/HaiseB/BileMo.git``
- ``composer install``

## Settings

Change default values in .env as needeed (prefer create a .env.local file)
- doctrine/doctrine-bundle
- lexik/jwt-authentication-bundle

Configuration jwt

- ``mkdir config/jwt``

> for the password choose the same as the .env one

- ``openssl genrsa -out config/jwt/private.pem -aes256 4096``
- ``openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem``

Create database
- ``php bin/console doctrine:database:create``
- ``php bin/console doctrine:migrations:migrate``
- ``php bin/console hautelook:fixtures:load``

## How to use

To launch symfony (choose one, according to your preferences)

- ``php -S 127.0.0.1:8000 -t public``
- ``symfony serve -d``

To connect choose one of the client created
- Every passwords are initialized at "demodemo"

For the documentation refer to 
- https://documenter.getpostman.com/view/7061814/TW76CQ9c
- https://127.0.0.1:8000/api/bm0495/documentation (Api platform generated documentation (swagger v3))

## Build with
- [Symfony 5](https://symfony.com/) - PHP framework

### Author
* **Benjamin Haise** _alias_ [@HaiseB](https://github.com/HaiseB)
