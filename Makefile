.PHONY: migrate
migrate:
	@php artisan migrate --path=/database/migrations --path=/database/migrations/admin \
	--path=/database/migrations/orchid --path=/database/migrations/updates \
	--path=/database/migrations/users

.PHONY: ide-helper
ide-helper:
	@echo "--> Generating documentations for Eloquent, models and meta..."
	@php artisan ide-helper:eloquent
	@php artisan ide-helper:generate
	@php artisan ide-helper:meta
	@php artisan ide-helper:models -M
	@echo "--> Successfully generated documentations"

.PHONY: format
format:
	@echo "--> Formatting codes..."
	@./vendor/bin/pint
	@echo "--> Successfully formatted codes"

.PHONY: api
	@php artisan openapi:generate > ./public/docs.json

.PHONY: check
check:
	@echo "--> Checking documentations..."
	@./vendor/bin/phpstan

.PHONY: test
test:
	@echo "--> Testing web application..."
	@php artisan test

# For production mode
.PHONY: build
build:
	@echo "--> Building in progress..."
	@composer install
	@npm install --verbose
	@npm run build
	@composer install --optimize-autoloader --no-dev
	@rm -rfv node_modules/
	@cd .. && chown www-data:www-data -Rv tamdaz-portfolio && cd tamdaz-portfolio/
	@echo "--> Successfully built !"

.PHONY: pull
pull:
	@git pull origin main

.PHONY: maintenance
maintenance:
	@php artisan down
	@supervisorctl stop 'laravel-worker:*'

.PHONY: production
production:
	@supervisorctl start 'laravel-worker:*'
	@php artisan up

# PLEASE ROLLBACK ACCORDING TO YOUR NEEDS
.PHONY: rollback
rollback:
	@php artisan migrate:rollback --path=/database/migrations --path=/database/migrations/admin

# Only in dev mode
.PHONY: start-container
start-container:
	@./vendor/bin/sail up -d

.PHONY: verify
verify:
	@make check && make test