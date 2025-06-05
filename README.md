# Contact Manager

A simple web application for managing your contacts, built with Laravel.

## Features

- User authentication (Login, Register)
- Dashboard with an overview of contacts and quick actions
- Add, view, edit, and delete contacts
- Manage tags for organizing contacts
- Clean and responsive UI using Tailwind CSS

## Installation

Follow these steps to get the project up and running on your local machine.

1.  **Clone the repository:**

    ```bash
    git clone <repository_url>
    cd ContactManager
    ```
    *(Replace `<repository_url>` with the actual URL of your repository)*

2.  **Install PHP dependencies using Composer:**

    ```bash
    composer install
    ```

3.  **Install Node dependencies using npm (for Tailwind CSS):**

    ```bash
    npm install
    ```

4.  **Copy the example environment file and configure it:**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

    Edit the `.env` file to configure your database connection and other settings.

5.  **Run database migrations:**

    ```bash
    php artisan migrate
    ```

6.  **Build frontend assets (for Tailwind CSS):**

    ```bash
    npm run dev
    ```
    or for production build:
    ```bash
    npm run build
    ```

## Usage

1.  **Start the Laravel development server:**

    ```bash
    php artisan serve
    ```

2.  **Access the application:**

    Open your web browser and visit `http://127.0.0.1:8000` (or the URL provided by `php artisan serve`).

3.  **Register or Log In:**

    If you are a new user, register for an account. Otherwise, log in with your existing credentials.

4.  **Manage Contacts and Tags:**

    Use the navigation links to access the dashboard, contacts list, or tag management pages.

## Technologies Used

- Laravel
- PHP
- Composer
- Tailwind CSS
- JavaScript
- SQLite (default database)

## Contributing

Contributions are welcome! Please feel free to submit issues or pull requests.

## License

This project is open-source and licensed under the [MIT License](LICENSE.md).
