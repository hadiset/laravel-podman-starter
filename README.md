<p align="center">
  <img src="https://img.shields.io/badge/Laravel-13-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 13" />
  <img src="https://img.shields.io/badge/Podman-Compose-892CA0?style=for-the-badge&logo=podman&logoColor=white" alt="Podman Compose" />
  <img src="https://img.shields.io/badge/PHP-8.5--fpm--alpine-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.5" />
  <img src="https://img.shields.io/badge/PostgreSQL-16--alpine-4169E1?style=for-the-badge&logo=postgresql&logoColor=white" alt="PostgreSQL 16" />
</p>

<h1 align="center">🚀 Laravel Podman Starter</h1>

<p align="center">
  A batteries-included, container-native Laravel starter — spin up a full dev stack in minutes, not hours.
</p>

<p align="center">
  <img src="https://img.shields.io/github/stars/hadiset/laravel-podman-starter?style=flat-square" alt="stars" />
  <img src="https://img.shields.io/github/last-commit/hadiset/laravel-podman-starter?style=flat-square" alt="last commit" />
  <img src="https://img.shields.io/github/license/hadiset/laravel-podman-starter?style=flat-square" alt="license" />
</p>

---

## ✨ Features

| | |
|---|---|
| 🐘 | **Laravel 13** — the latest and greatest |
| 📦 | **Podman Compose** — daemonless, rootless containers |
| 🌐 | **Nginx (alpine)** — lean, fast reverse proxy |
| ⚙️ | **PHP 8.5-fpm-alpine** — slim runtime, modern PHP |
| 🐘 | **PostgreSQL 16 (alpine)** — solid, production-grade DB |
| ⚡ | **Vite Hot Reload** — instant frontend feedback loop |

---

## 📋 Requirements

- [Podman](https://podman.io/)
- [podman-compose](https://github.com/containers/podman-compose)

---

## 🛠️ Installation

```bash
git clone https://github.com/hadiset/laravel-podman-starter.git
cd laravel-podman-starter

cp .env.example .env

podman compose up -d --build

npm install
composer install

php artisan key:generate
php artisan migrate:fresh --seed
```

### 🔐 Fix storage & cache permissions

Containers run as `www-data` — make sure it can write:

```bash
chown -R www-data:www-data storage/ bootstrap/cache
chmod -R 755 storage/ bootstrap/cache
```

---

## ✅ You're ready

Your app should now be up and running with hot reload wired in. Happy shipping! 🎉

---

<p align="center">
  Made with ❤️ by <a href="https://github.com/hadiset">Hadi Setiawan</a>
</p>
