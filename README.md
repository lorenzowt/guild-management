# Guild Management

A Laravel web application for managing an adventurers' guild. Track heroes, browse quests, and assign heroes to missions. Completing a mission updates its outcome and the participating heroes' levels and conditions.

## Technologies

- **PHP 8.3+ and Laravel 13** for server-side application logic, routing, validation, and persistence.
- **Blade** for server-rendered pages and reusable view partials.
- **MySQL** as the recommended local database. SQLite is also supported by Laravel; `.env.example` currently defaults to SQLite.
- **Vite 8** to build and serve frontend assets, integrated with Laravel through `laravel-vite-plugin`.
- **Tailwind CSS 4** for styling.
- **JavaScript** for interactive page behavior, including modal dialogs and asynchronous loading of view partials.
- **Tom Select 2** for searchable quest and hero selectors when creating missions.


## Requirements

- PHP 8.3 or newer with the `pdo_mysql` extension enabled
- Composer
- Node.js 20.19+ or 22.12+, with npm
- MySQL 8 or another compatible MySQL server

## Installation

1. Clone the repository and enter the project directory.

2. Install the PHP dependencies and create your environment file:

   ```bash
   composer install
   cp .env.example .env
   ```

   If you already have a `.env` file, keep it and update its database settings instead of replacing it.

3. Create an empty MySQL database, for example `guild_management`, and update the database section of `.env` with your local connection details:

   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=guild_management
   DB_USERNAME=your_mysql_user
   DB_PASSWORD=your_mysql_password
   ```

   The checked-in `.env.example` uses SQLite by default; set `DB_CONNECTION=mysql` as shown above for this setup. The MySQL server must be running, and the database must exist before continuing.

4. Generate the application key, create the tables, and populate the sample guild data:

   ```bash
   php artisan key:generate
   php artisan migrate --seed
   ```

   The default seeders add five sample heroes, three quests, and six missions.

5. Install the JavaScript dependencies and build the frontend assets:

   ```bash
   npm ci
   npm run build
   ```

   Tom Select is already declared in `package.json`, so `npm ci` installs it along with the other frontend dependencies. No separate Tom Select installation is needed.

## Running Locally

Start the local development processes with:

```bash
composer run dev
```

This runs the Laravel development server, the database queue listener, the log viewer, and the Vite development server together. Open [http://localhost:8000](http://localhost:8000) in your browser. Stop the processes with `Ctrl+C`.

To run the test suite:

```bash
composer run test
```

## How the Application Works

The application follows Laravel's MVC structure. Routes in `routes/web.php` connect requests to controllers; controllers work with Eloquent models and return Blade views. The browser renders those server-generated views, while small JavaScript entry points add interactions without replacing the server-rendered application with a single-page app.

For example, the hero and quest screens use JavaScript to open modal dialogs and fetch HTML fragments from Laravel routes. Those fragments are Blade partials inserted into the open modal, so the controller and Blade view remain responsible for preparing and presenting the data. The mission form uses Tom Select to make quest and hero selection easier.

Mission completion is handled by the `CompleteMission` service. It delegates the success/failure decision to `MissionOutcomeCalculator`, which compares the quest difficulty with the party's combined hero levels and a bonus for party class diversity. A successful mission levels up its heroes; a failed mission lowers their levels and injures them. This keeps the mission rules in the application layer instead of embedding them in the controller or frontend.

## License

This project is licensed under the MIT License.
