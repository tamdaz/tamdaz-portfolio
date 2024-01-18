.PHONY: migrate ide-helper rollback format check
migrate:
	@php artisan migrate --path=/database/migrations --path=/database/migrations/admin --path=/database/migrations/orchid --path=/database/migrations/updates --path=/database/migrations/users

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
	@rm -rfv node_modules/
	@cd ..
	@chown www-data:www-data -Rv tamdaz-portfolio
	@cd tamdaz-portfolio/
	@echo "--> Successfully built !"

# PLEASE ROLLBACK ACCORDING TO YOUR NEEDS
rollback:
	@php artisan migrate:rollback --path=/database/migrations --path=/database/migrations/admin
