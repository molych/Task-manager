start:
	php artisan serve --host 0.0.0.0

setup:
	composer install
	cp -n .env.example .env|| true
	php artisan key:gen --ansi
	touch database/database.sqlite
	php artisan migrate
	php artisan db:seed
	npm install

migrate:
	php artisan migrate

heroku migrate:
	heroku run php artisan migrate

console:
	php artisan tinker

log:
	heroku logs --tail

route:
	php artisan route:list

test:
	php artisan test

deploy:
	git push heroku main

lint:
	composer phpcs 

lint-fix:
	composer phpcbf 

install:
	composer install


test-coverage:
	composer phpunit -- --coverage-clover build/logs/clover.xml

watch:
	npm run watch

push:
	git push origin main

seed:
	php artisan db:seed

seed-fresh:
	php artisan migrate:fresh --seed