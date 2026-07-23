# Laravel Podman Starter

## Features

- Laravel 13
- Podman Compose
- Nginx-alpine
- PHP 8.5-fpm-alpine
- PostgreSQL 16-alpine
- Hot Reload (Vite)

## Requirements

- podman
- podman-compose

## Installation

git clone https://github.com/hadiset/laravel-podman-starter.git

cp .env.example .env

podman compose up -d

composer install

php artisan key:generate

php artisan migrate:fresh --seed
