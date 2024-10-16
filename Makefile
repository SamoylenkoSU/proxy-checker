migrate-db:
	docker compose exec php php bin/console doctrine:migrations:migrate

start-proxy-report-queue:
	docker compose exec php php bin/console messenger:consume

generate-api:
	docker compose exec php protoc -I ../specification/protobuf --php_out=./generated/grpc --grpc_out=./generated/grpc --plugin=protoc-gen-grpc=/usr/bin/grpc_php_plugin api.proto

fix-style:
	docker compose exec php vendor/bin/php-cs-fixer fix

composer:
	docker compose exec php composer install