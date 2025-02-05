# Customer CRUD in Laravel 11

## Introduction
This is a simple Customer CRUD (Create, Read, Update, Delete) application built using Laravel 11. It allows users to manage customer records efficiently.

## Features
- Create new customers
- View a list of all customers
- Update customer details
- Delete customers

## Requirements
- PHP 8.2 or higher
- Composer
- MySQL or any other supported database
- Laravel 11

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/marvel008/customer-crud-laravel.git
   cd customer-crud-laravel11
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Copy environment file**
   ```bash
   cp .env.example .env
   ```

4. **Set up database**
   - Open the `.env` file and configure your database settings:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_database_user
     DB_PASSWORD=your_database_password
     ```

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

6. **Serve the application**
   ```bash
   php artisan serve
   ```

   The application will be available at `http://127.0.0.1:8000`.

## API Routes
| Method | URI | Description |
|--------|-----|-------------|
| GET | /customers | Get all customers |
| GET | /customers/{id} | Get a specific customer |
| POST | /customers | Create a new customer |
| PUT | /customers/{id} | Update a customer |
| DELETE | /customers/{id} | Delete a customer |

## License
This project is licensed under the MIT License.

## Contribution
Feel free to submit pull requests or open issues to improve this project.

