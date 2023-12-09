.PHONY: migrate format check
migrate:
	@php artisan migrate --path=/database/migrations --path=/database/migrations/admin

format:
	@./vendor/bin/pint

check:
	@./vendor/bin/phpstan