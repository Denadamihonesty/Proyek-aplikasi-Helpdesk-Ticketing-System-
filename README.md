# Helpdesk Ticketing System (Laravel 10)

A web-based Helpdesk Ticketing System built with Laravel 10.  
This system allows users to create and submit support tickets, while support staff can view, update, and track ticket statuses efficiently.

---

## 1. Overview

This project demonstrates a basic implementation of a helpdesk system using the Laravel framework.  
It includes CRUD operations, database relationships, and a clear workflow for users and support staff.

---

## 2. Features

- Users can create new support tickets (Hardware, Software, or Network).
- Support team can view, edit, and update ticket statuses.
- Ticket logs are automatically recorded in the database.
- Responsive and minimalist interface using Blade templates and CSS.
- Integrated with MySQL through Laravel’s Eloquent ORM.

---

## 3. System Requirements

Before running this project, make sure the following components are installed:

- PHP 8.1 or higher  
- Composer 2.x or higher  
- MySQL or MariaDB  
- XAMPP / Laragon / Localhost  
- Visual Studio Code (recommended)

---

## 4. Installation and Setup

Follow these steps to set up and run the project locally:

```bash
# 1. Clone or download the repository
git clone https://github.com/<your-username>/helpdesk-laravel.git
cd helpdesk-laravel

# 2. Install Laravel dependencies
composer install

# 3. Copy the example environment file
cp .env.example .env

# 4. Generate the Laravel application key
php artisan key:generate

# 5. Create a database in phpMyAdmin (e.g., helpdesk_db)
# Then update your .env file:
# DB_DATABASE=helpdesk_db
# DB_USERNAME=root
# DB_PASSWORD=

# 6. Run migrations and seeders
php artisan migrate --seed

# 7. Start the Laravel development server
php artisan serve

Open your browser and visit:
http://127.0.0.1:8000/tickets 
```
---

## 5. Database Structure (ERD Overview)

The project includes four main tables:

Table              Description
users              Stores user and support account information
categories         Contains ticket categories
tickets            Stores ticket details such as title, description, and status
tickets_logs       Record ticket status changes and notes

Relationships:
- One user can create many tickets (1:N)
- One category can have many tickets (1:N)
- One ticket can have multiple logs (1:N)

---

## 6. Project Structure

```bash
helpdesk-laravel/
├── app/
│   ├── Http/Controllers/        # Contains SupportTicketController
│   ├── Models/                  # Eloquent models
│   └── ...
├── resources/
│   └── views/tickets/           # Blade templates (index.blade.php, create.blade.php)
├── public/css/style.css         # Custom CSS for page styling
├── routes/web.php               # Route definitions
├── database/migrations/         # Database schema migrations
├── .env.example                 # Example configuration file
└── README.md                    # Project documentation
```

---

## 7. Usage Flow

For Users:

1. Access /tickets to view existing tickets.
2. Click “Buat Ticket Baru” to create a new ticket.
3. Fill in User ID, Category, Title, and Description.
4. Submit the form to save the ticket.

For Support Team:

1. Access /support/tickets to view all tickets.
2. Update the ticket status (Open, On Progress, Resolved, Closed).
3. Add optional notes for progress tracking.
4. All updates are logged automatically in ticket_logs.

---

## 8. Common Artisan Commands

```bash
# Run local server
php artisan serve

# Refresh database with seed data
php artisan migrate:fresh --seed

# Clear caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

---

## 9. Testing and Access

To test the system:
- Use User IDs 2–5 (regular users)
- Add a support user manually in the users table with the role “support”

---

## 10. License

This project is open-source under the MIT License.
You are free to use, modify, and distribute it for learning or development purposes.

---

## 11. Author and Credits

Author: Denada Putrisia
Position Tested: IT Developer – Technical Test (Helpdesk Laravel Project)
Date: November 2025

Tools Used:
- Laravel 10 (PHP Framework)
- MySQL (Database)
- Visual Studio Code (IDE)
- XAMPP (Localhost Server)
- Git & GitHub (Version Control)

---