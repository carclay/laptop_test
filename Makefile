#!/usr/bin/make
# Makefile readme (ru): <http://linux.yaroslavl.ru/docs/prog/gnu_make_3-79_russian_manual.html>
# Makefile readme (en): <https://www.gnu.org/software/make/manual/html_node/index.html#SEC_Contents>

SHELL = /bin/sh

REGISTRY_HOST = registry.gitlab.com
REGISTRY_PATH = httpx/php/
IMAGES_PREFIX := $(shell basename $(shell dirname $(realpath $(lastword $(MAKEFILE_LIST)))))

# Important: Local images naming should be in docker-compose naming style

IMAGE = $(REGISTRY_HOST)/$(REGISTRY_PATH)php-cli

CONTAINER_NAME := app

docker_bin := $(shell command -v docker 2> /dev/null)
docker_compose_bin := $(shell command -v docker-compose 2> /dev/null)

all_images = $(IMAGE)

ifeq "$(REGISTRY_HOST)" "registry.gitlab.com"
	docker_login_hint ?= "\n\
	**************************************************************************************\n\
	* Make your own auth token here: <https://gitlab.com/profile/personal_access_tokens> *\n\
	**************************************************************************************\n"
endif

.PHONY : help login test clean \
		 test-phpstan test-phpunit \
         up down restart shell install
.DEFAULT_GOAL := help

# This will output the help for each task. thanks to https://marmelab.com/blog/2016/02/29/auto-documented-makefile.html
help: ## Show this help
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "  \033[36m%-15s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)
	@echo "\n  It's no help"

# --- [ Application ] -------------------------------------------------------------------------------------------------

login: ## Log in to a remote Docker registry
	@echo $(docker_login_hint)
	$(docker_bin) login $(REGISTRY_HOST)

clean: ## Remove images from local registry
	-$(docker_compose_bin) down -v
	$(foreach image,$(all_images),$(docker_bin) rmi -f $(image);)

# --- [ Development tasks ] -------------------------------------------------------------------------------------------

---------------: ## ---------------

up: ## Start all containers (in background) for development
	$(docker_compose_bin) up --no-recreate -d

down: ## Stop all started for development containers
	$(docker_compose_bin) down

restart: up ## Restart all started for development containers
	$(docker_compose_bin) restart

shell: up ## Start shell into application container
	$(docker_compose_bin) exec "$(CONTAINER_NAME)" /bin/sh

install: up ## Install application dependencies into application container
	$(docker_compose_bin) exec "$(CONTAINER_NAME)" composer install --no-interaction --ansi --no-suggest

init: install ## Make full application initialization (install, seed, build assets, etc)

test: test-phpunit test-phpstan ## Execute application tests

test-phpstan: up ## Execute phpstan tests
	$(docker_compose_bin) exec "$(CONTAINER_NAME)" composer test:phpstan

test-phpunit: up ## Execute phpunit tests
	$(docker_compose_bin) exec "$(CONTAINER_NAME)" composer test:phpunit
