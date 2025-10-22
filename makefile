DOCKER_EXEC = docker exec -it laravel_app bash -c

ifeq ($(OS),Windows_NT)
    ENV_CMD = if not exist .env copy .env.example .env
else
    ENV_CMD = if [ ! -f .env ]; then cp .env.example .env; fi
endif

start:
	$(ENV_CMD)
	docker compose up -d --build
	$(DOCKER_EXEC) "composer install"
	$(DOCKER_EXEC) "php artisan key:generate"
	$(DOCKER_EXEC) "npm install"
	$(DOCKER_EXEC) "npm run build"
	$(DOCKER_EXEC) "php artisan migrate"

build:
	docker compose up -d --build

stop:
	docker compose down
