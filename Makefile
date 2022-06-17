build:
	docker-compose build --force-rm

start:
	docker-compose up

stop:
	docker-compose down

status:
	docker-compose ps

restart: stop start

test:
	docker-compose run --rm php sh -c "vendor/bin/phpunit ./tests"

composer_install:
	docker-compose run --rm php sh -c "composer install"
