# The Vote Hub

Live app: http://thevotehub.atwebpages.com/#/

## Overview
The Vote Hub is a Vue 3 single-page application for a simple star-based voting flow. Users can log in, see their profile and voting status, then distribute up to 4 total stars across multiple candidates and submit. The app supports internationalization and uses Bootstrap for UI.

## Features
- **Authentication (demo)**: Home page shows trial credentials to sign in for testing.
- **Voting flow**: Distribute up to 4 total stars across candidates with interactive star widgets and client-side validation.
- **Profile**: Shows user info and whether they have already voted.
- **Internationalization**: i18n via `src/i18n/`.
- **Routing**: Hash-based routing suitable for static hosting.

## Tech stack
- **Frontend**: Vue 3, Vue Router (hash history), Pinia, Vue I18n
- **UI**: Bootstrap 5, Bootstrap Icons
- **Backend (optional)**: Lightweight PHP endpoints in `backend/`
- **Database**: Example schema in `vote.sql` (MySQL-compatible)

## Project structure
- `src/` – Vue app (entry: `src/main.js`, routes in `src/router/index.js`, views in `src/views/`)
- `backend/` – PHP scaffold (`backend/api/apiFile.php`, `backend/api/db.php`)
- `public/` – Static assets for the Vue CLI build
- `vote.sql` – SQL schema/example to initialize the database

## Getting started (frontend)
Prerequisites: Node.js LTS and npm.

1. Install dependencies
   ```bash
   npm install
   ```
2. Start the dev server
   ```bash
   npm run serve
   ```
3. Open the app at the printed local URL (hash router, no special server config needed).

Notes:
- By default, the voting submission in `src/views/Voting.vue` posts to the hosted backend:
  `http://thevotehub.atwebpages.com/apiFile.php?action=submitVotes`.
- If you self-host the backend locally, update that URL accordingly.

## Optional: run the PHP backend locally
Prerequisites: PHP 7.4+ and a MySQL/MariaDB server.

1. Configure DB credentials in `backend/api/db.php`.
2. Initialize your database using the statements in `vote.sql`.
3. Start PHP’s built-in server from the repo root:
   ```bash
   php -S localhost:8000 -t backend
   ```
4. Update the fetch URL in `src/views/Voting.vue` to point to your local endpoint, e.g.:
   ```js
   fetch('http://localhost:8000/apiFile.php?action=submitVotes', { ... })
   ```

## Build for production
```bash
npm run build
```
This generates the `dist/` folder. Because the app uses hash history, it can be deployed to static hosting without server-side rewrites.

## Routes
- `/` – Home (login button and trial credentials)
- `/profile` – User profile and voting status
- `/voting` – Star-based voting UI (max total of 4 stars across candidates)

## Demo credentials
- Email: `user@gmail.com`
- Password: `123456`

## Configuration reference
Built with Vue CLI. See https://cli.vuejs.org/config/ for advanced configuration.

## Author
- Amal Abdalla
