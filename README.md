# Pembelian Bahan Bakar (Fuel Purchase)

A simple CRUD Laravel application to manage fuel purchase transactions.

## Requirements

- PHP 8.2+
- Composer
- SQLite (default; no extra setup needed)

## Setup

```bash
# Install dependencies (if not already done)
composer install

# Copy environment file and generate key (if needed)
cp .env.example .env
php artisan key:generate

# Create SQLite database (already created by default)
touch database/database.sqlite

# Run migrations
php artisan migrate
```

## Run the Application

```bash
php artisan serve
```

Open [http://localhost:8000](http://localhost:8000). You will be redirected to the transactions list.

## Features

- **CRUD** for fuel purchase transactions
- **Fields:** Customer name, fuel type (Pertalite, Pertamax, Pertamax Turbo, Solar, Dexlite), liters, total price (IDR)
- **UI:** Tailwind CSS (CDN), responsive table, striped/hover rows, distinct buttons (Add = blue, Edit = amber, Delete = red)
- **IDR formatting** via `formatted_total_price` accessor on the Transaction model

## Project Structure

- `app/Models/Transaction.php` – Model with fillable, casts, and IDR accessor
- `app/Http/Controllers/TransactionController.php` – Resource controller
- `resources/views/layouts/app.blade.php` – Layout with Tailwind CDN and navbar
- `resources/views/transactions/` – index, create, edit views
- `routes/web.php` – Resource route for `transactions`

## Creating the Project from Scratch (Reference)

To create a new Laravel project with this name:

```bash
composer create-project laravel/laravel PembelianBahanBakar
cd PembelianBahanBakar
```

Tailwind is included via CDN in the layout; no Vite/Node build step is required.
