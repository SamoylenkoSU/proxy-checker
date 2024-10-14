start-proxy-report-queue:
	docker compose exec php php bin/console messenger:consume --limit=10

generate-api:
	docker compose exec php protoc -I ../specification/protobuf --php_out=./generated/grpc --grpc_out=./generated/grpc --plugin=protoc-gen-grpc=/usr/bin/grpc_php_plugin api.proto