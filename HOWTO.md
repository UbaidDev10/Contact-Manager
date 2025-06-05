# HOWTO Set Up and Run the Contact Manager

This guide provides detailed steps to set up and run the Contact Manager application on your local machine.

## Prerequisites

Ensure you have the following installed:

- PHP (>= 8.1)
- Composer
- Node.js and npm
- A database system (e.g., MySQL, PostgreSQL, or SQLite - SQLite is used by default in `.env.example`)

## Setup Steps

1.  **Clone the repository:**

    If you haven't already, clone the project repository from its source.

    ```bash
    git clone <repository_url>
    cd ContactManager
    ```
    Replace `<repository_url>` with the actual URL of your project repository.

2.  **Install PHP Dependencies:**

    Navigate to the project root directory in your terminal and run Composer to install the backend dependencies.

    ```bash
    composer install
    ```

3.  **Install Node Dependencies:**

    Install the frontend dependencies, including Tailwind CSS.

    ```bash
    npm install
    ```

4.  **Set up Environment File:**

    Copy the example environment file and generate an application key.

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5.  **Configure Environment Variables:**

    Open the newly created `.env` file in a text editor. Configure your database connection details (DB_CONNECTION, DB_DATABASE, DB_USERNAME, DB_PASSWORD, etc.). If using SQLite, you only need to ensure `DB_CONNECTION=sqlite` and potentially `DB_DATABASE` is set to the path where you want the database file.

    Example for SQLite:

    ```dotenv
    DB_CONNECTION=sqlite
    # DB_DATABASE=/path/to/your/database.sqlite # Uncomment and set if needed
    # Other DB settings can be commented out or removed
    ```

6.  **Run Database Migrations:**

    Apply the database migrations to create the necessary tables.

    ```bash
    php artisan migrate
    ```

7.  **Build Frontend Assets:**

    Compile the frontend assets (Tailwind CSS, JavaScript). For development with hot reloading, use `npm run dev`.

    ```bash
    npm run dev
    ```
    For a production build, use `npm run build`.

    ```bash
    npm run build
    ```

## Running the Application

1.  **Start the Laravel Development Server:**

    In your terminal, from the project root, start the Laravel development server.

    ```bash
    php artisan serve
    ```

2.  **Access the Application:**

    Open your web browser and go to the address shown in the terminal output (usually `http://127.0.0.1:8000`).

You should now see the Contact Manager application's welcome page.

## Troubleshooting

- If you encounter database errors, double-check your `.env` file's database configuration.
- If frontend styles are not applied, ensure you have run `npm install` and `npm run dev` (or `npm run build`).
- If you see class not found errors related to Tailwind components, make sure you have included them in your `tailwind.config.js` and run the npm build command.