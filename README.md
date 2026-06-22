# Personal Portfolio

This project runs in Docker instead of relying on a local XAMPP install. The application container serves the PHP files with Apache, a MariaDB container initializes the database from `sql/a09_jenkins.sql`, and a BrowserSync container provides hot reload for development.

## Requirements

- Docker Desktop or another recent Docker engine with Compose support

## Quick start

1. Optional: copy `.env.example` to `.env` if you want to customize ports or database credentials.
2. Start the stack:

```bash
docker compose up --build
```

3. Open `http://localhost:3000` for the BrowserSync dev URL.
4. Open `http://localhost:8080` for the direct Apache-served app.
5. Stop the stack with `docker compose down`.

## Hot reload

The `dev` service runs BrowserSync and watches PHP, JS, CSS, and HTML files in the repo. When files change, BrowserSync refreshes the browser automatically.

- Hot reload URL: `http://localhost:3000`
- BrowserSync control UI: `http://localhost:3001`
- Apache app URL without reload proxy: `http://localhost:8080`

Because the repo is bind-mounted into the containers, PHP changes are reflected immediately by Apache and BrowserSync handles the browser refresh layer. The PHP pages also emit the BrowserSync client script through the `LIVE_RELOAD_URL` environment variable, so reload works consistently across the rendered app pages.

## Services

- `web`: PHP 8.2 with Apache, serving the project from the workspace root
- `dev`: BrowserSync proxy for hot reload during development
- `db`: MariaDB 11.4, seeded from `sql/a09_jenkins.sql` on first startup

Default port mappings:

- Hot reload app: `3000 -> 3000`
- BrowserSync UI: `3001 -> 3001`
- Apache app: `8080 -> 80`
- Database: `3307 -> 3306`

## Configuration

The PHP app reads its database settings from environment variables. These are provided automatically by Compose:

- `DB_HOST`
- `DB_PORT`
- `DB_NAME`
- `DB_USER`
- `DB_PASSWORD`
- `WEBSITE_URL`
- `LIVE_RELOAD_URL`

Optional dev port variables can be set in `.env`:

- `WEB_PORT`
- `DEV_PORT`
- `DEV_UI_PORT`
- `DB_PORT`

If the database variables are not set, the PHP code falls back to local defaults so the app still works in a non-container setup.

## Development notes

- `docker compose up --build` starts all three services: `web`, `dev`, and `db`.
- The BrowserSync client is served from port `3000`, so that port must stay reachable from your browser for live reload to work.
- If dependencies for the `dev` service need to be rebuilt, restart it with `docker compose up -d --build dev`.

## Database lifecycle

MariaDB only imports `sql/a09_jenkins.sql` when the database volume is created for the first time. If you need to re-seed from scratch, remove the containers and volume first:

```bash
docker compose down -v
docker compose up --build
```
