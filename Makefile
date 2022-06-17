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
	docker-compose run --rm php sh -c "vendor/bin/phpunit ./tests"

composer_install:
	docker-compose run --rm php sh -c "composer install"

composer_update:
	docker-compose run --rm php sh -c "composer update"
