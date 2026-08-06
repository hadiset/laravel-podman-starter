CONTAINER := laradocker

.PHONY: setup env up npm composer key migrate perms

setup: env up npm composer key migrate perms ## Full setup from scratch

env: ## Copy .env.example to .env if not exists
	@test -f .env || cp .env.example .env

up: ## Build and start podman containers
	podman-compose up -d --build

npm: ## Install JS dependencies
	npm install

composer: ## Install PHP dependencies inside container
	podman exec -it $(CONTAINER) composer install

key: ## Generate Laravel app key
	podman exec -it $(CONTAINER) php artisan key:generate

migrate: ## Fresh migrate + seed
	podman exec -it $(CONTAINER) php artisan migrate:fresh --seed

perms: ## Fix storage & cache permissions
	podman exec -it $(CONTAINER) chown -R www-data:www-data storage/ bootstrap/cache
	podman exec -it $(CONTAINER) chmod -R 755 storage/ bootstrap/cache

down: ## Stop containers
	podman-compose down
