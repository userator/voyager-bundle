build:
	docker-compose build --force-rm

start:
	docker-compose up --remove-orphans

stop:
	docker-compose down --remove-orphans

status:
	docker-compose ps

restart: stop start

test:
	docker-compose exec -i php /vendor/bin/phpunit

composer_install:
	docker-compose exec -i php composer install

composer_update:
	docker-compose exec -i php composer update

shell:
	docker compose exec -i php bash

stan:
	docker compose exec -i php /app/vendor/bin/phpstan analyze -c /app/phpstan.neon