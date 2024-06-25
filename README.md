# PHP WebSocket Chat

A simple chat application for testing websockets.

## Deployment

Docker Compose is the recommended way to deploy the application.  
I will eventually host a proper [dockerhub](https://hub.docker.com/) image, but Docker Compose is easier (and more familiar) to maintain for now.

1. Utilize the [Docker Compose file](docker-compose.yml)
2. Copy `./.env` to `./.env` and edit as necessary (**WIP**)
3. Copy `./includes/config.example.php` to `./includes/config.php` and edit as necessary.

## Development

### Build

Singular Build: `npm run build`

- Dev build 
	- `tsc --watch`  

### The Stack

[PHP](https://www.php.net/) + [HTMX](https://htmx.org/) + SQLite 
(Plus [NGINX](https://nginx.org/) as a reverse proxy.)  
