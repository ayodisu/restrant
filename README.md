# 🍽️ Restoran - Restaurant Management System

A full-featured restaurant management system built with Laravel 10, featuring an online food ordering system, table booking, customer reviews, and a modern admin dashboard.

![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=flat&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=flat&logo=php&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=flat&logo=bootstrap&logoColor=white)

## ✨ Features

### Customer Portal

- **Browse Menu** - View food items by category (Breakfast, Lunch, Dinner)
- **Shopping Cart** - Add items to cart and manage quantities
- **Online Ordering** - Complete checkout with delivery details
- **Table Booking** - Reserve tables with date, time, and guest count
- **Customer Reviews** - Share dining experiences and feedback
- **Order History** - Track past orders and bookings

### Admin Dashboard

- **Modern UI** - Clean, responsive design with Bootstrap 5
- **Order Management** - View, update status, and delete orders
- **Booking Management** - Handle table reservations
- **Food Menu Management** - Add, view, and remove food items
- **Admin Management** - Create and manage admin accounts
- **Dashboard Analytics** - Quick stats on orders, bookings, and more

## 🛠️ Tech Stack

| Component      | Technology                                     |
| -------------- | ---------------------------------------------- |
| Backend        | Laravel 10.x                                   |
| Frontend       | Blade Templates, Bootstrap 5.3, Font Awesome 6 |
| Database       | MySQL                                          |
| Authentication | Laravel UI (Multi-guard: Users & Admins)       |
| Build Tool     | Vite                                           |

## 📁 Project Structure

```text
restrant/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admins/          # Admin dashboard controllers
│   │   │   ├── Food/            # Food, cart, checkout controllers
│   │   │   ├── Users/           # User portal controllers
│   │   │   └── HomeController   # Public pages
│   │   └── Middleware/
│   └── Models/
│       ├── Admin/               # Admin model
│       ├── Food/                # Food, Cart, Checkout, Booking, Review
│       └── User.php
├── database/
│   └── migrations/              # All database migrations
├── resources/
│   └── views/
│       ├── admins/              # Admin dashboard views
│       ├── auth/                # Login/Register views
│       ├── layouts/             # app.blade.php, admin.blade.php
│       ├── pages/               # About, Contact, Services
│       └── users/               # User booking/order history
├── routes/
│   └── web.php                  # All application routes
└── public/
    └── assets/                  # CSS, JS, images
```

## 🚀 Installation

### Prerequisites

- PHP 8.1 or higher
- Composer
- Node.js & NPM
- MySQL

### Setup Steps

1. **Clone the repository**

    ```bash
    git clone https://github.com/ayodisu/restrant.git
    cd restrant
    ```

2. **Install PHP dependencies**

    ```bash
    composer install
    ```

3. **Install Node dependencies**

    ```bash
    npm install
    ```

4. **Environment setup**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5. **Configure database** in `.env`

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=restrant
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6. **Run migrations**

    ```bash
    php artisan migrate
    ```

7. **Build assets**

    ```bash
    npm run dev
    ```

8. **Start the server**

    ```bash
    php artisan serve
    ```

Visit `http://localhost:8000` to access the application.

## 🔐 Authentication

### User Authentication

- Register: `/register`
- Login: `/login`
- Access bookings, orders, and reviews after login

### Admin Authentication

- Admin Login: `/admin/login`
- Separate guard system for admin access
- Protected admin dashboard at `/admin/index`

## 📍 Routes Overview

| Route                 | Description                |
| --------------------- | -------------------------- |
| `/`                   | Homepage with menu preview |
| `/about`              | About page                 |
| `/services`           | Services page              |
| `/contact`            | Contact page               |
| `/food/menu`          | Full menu                  |
| `/food/cart`          | Shopping cart              |
| `/food/checkout`      | Checkout page              |
| `/users/all-bookings` | User's bookings            |
| `/users/all-orders`   | User's orders              |
| `/admin/login`        | Admin login                |
| `/admin/index`        | Admin dashboard            |
| `/admin/all-orders`   | Manage orders              |
| `/admin/all-bookings` | Manage bookings            |
| `/admin/all-foods`    | Manage food items          |
| `/admin/all-admins`   | Manage admins              |

## 📊 Database Models

| Model      | Description                               |
| ---------- | ----------------------------------------- |
| `User`     | Customer accounts                         |
| `Admin`    | Administrator accounts                    |
| `Food`     | Menu items (name, price, image, category) |
| `Cart`     | Shopping cart items                       |
| `Checkout` | Completed orders                          |
| `Booking`  | Table reservations                        |
| `Review`   | Customer reviews                          |

## 🎨 UI Features

- **Responsive Design** - Mobile-first approach
- **Toast Notifications** - Success/error feedback
- **Modern Admin Panel** - Dark sidebar, stat cards, action buttons
- **Status Badges** - Visual order/booking status indicators
- **Form Validation** - Client and server-side validation

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 👨‍💻 Developer

Developed by **Abdulwahab Disu** — [GitHub](https://github.com/ayodisu) · [Twitter](https://x.com/_ayodisu) · [LinkedIn](https://www.linkedin.com/in/abdulwahabdisu/)

---

⭐ Star this repo if you find it helpful!
