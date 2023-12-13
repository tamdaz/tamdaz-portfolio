.PHONY: migrate rollback format check
migrate:
	@php artisan migrate --path=/database/migrations --path=/database/migrations/admin --path=/database/migrations/orchid

rollback:
	@php artisan migrate:fresh --path=/database/migrations --path=/database/migrations/admin --path=/database/migrations/orchid

format:
	@./vendor/bin/pint

check:
	@./vendor/bin/phpstan