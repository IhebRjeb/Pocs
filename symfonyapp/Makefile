# Include environment variables
include .env

.PHONY: init start stop clean

init:
	@echo "Creating project directory: $(PROJECT_DIR)"
	@mkdir -p $(PROJECT_DIR)
	
	@echo "Installing Symfony skeleton..."
	@docker run --rm -v $(PWD)/$(PROJECT_DIR):/app composer create-project symfony/skeleton .
	
	@echo "Configuring Symfony environment..."
	@echo "DATABASE_URL=mysql://$(DB_USER):$(DB_PASSWORD)@db:3306/$(DB_NAME)?serverVersion=8.0" > $(PROJECT_DIR)/.env.local
	
	@echo "Initialization complete! Run 'make start' to start services."

start:
	@echo "Starting services..."
	@docker-compose -f compose.yaml up -d
	@echo "\nAccess your application at: http://localhost:8080"

stop:
	@echo "Stopping services..."
	@docker-compose -f compose.yaml down
# Composer tool
install-dev:
	@echo "Installing dep : $(Dep)"
	@docker run --rm -v $(PWD)/$(PROJECT_DIR):/app composer require $(Dep) --dev

install-all:
	@echo "Installing all dependencies"
        @docker run --rm -v $(PWD)/$(PROJECT_DIR):/app composer install
#<--End Composer tool--> 
clean: stop
	@echo "Removing project files and volumes..."
	@docker-compose -f compose.yaml down -v
	@rm -rf $(PROJECT_DIR)
	@echo "Cleanup complete."

.DEFAULT_GOAL := start
