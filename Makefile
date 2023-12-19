.PHONY: start

start:
	docker compose up -d
	while status=$(docker inspect --format="{{if .Config.Healthcheck}}{{print .State.Health.Status}}{{end}}" "$(docker compose ps -q mediawiki)"); do
		case $status in
		  starting) sleep 1;;
		  healthy) exit 0;;
		  unhealthy)
			docker compose ps
			docker compose logs
			exit 1
		  ;;
		esac
	  done
	docker compose exec mediawiki composer install