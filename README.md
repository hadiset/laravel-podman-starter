# Laravel Podman Starter

## Features

- Laravel 12
- Podman Compose
- Nginx
- PHP 8.4
- PostgreSQL
- Hot Reload (Vite)
- Production-like structure

## Requirements

- Podman
- podman-compose

## Installation

git clone ...

cp .env.example .env

podman compose up -d

composer install

php artisan key:generate

php artisan migrate
