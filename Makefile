.PHONY: migrate ide-helper rollback format check
migrate:
	@php artisan migrate --path=/database/migrations --path=/database/migrations/admin --path=/database/migrations/orchid

ide-helper:
	@echo "--> Generating documentations for Eloquent, models and meta..."
	@php artisan ide-helper:eloquent
	@php artisan ide-helper:generate
	@php artisan ide-helper:meta
	@php artisan ide-helper:models -M
	@echo "--> Successfully generated documentations"

format:
	@echo "--> Formatting codes..."
	@./vendor/bin/pint
	@echo "--> Successfully formatted codes"

check:
	@echo "--> Checking documentations..."
	@./vendor/bin/phpstan

test:
	@echo "--> Testing web application..."
	@php artisan test

# For production mode
build:
	@echo "--> Building in progress..."
	@composer install
	@npm install --verbose
	@npm run build
	@composer install --optimize-autoloader --no-dev
	@rm -rf node_modules/
	@echo "--> Successfully built !"

# DON'T USE IN PRODUCTION MODE
rollback:
	@php artisan migrate:fresh --path=/database/migrations --path=/database/migrations/admin --path=/database/migrations/orchid
