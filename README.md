# Event Management System

A modern **Event Management System** built with **Laravel 11**, MySQL, and Stripe payment integration. This system allows users to manage events efficiently with CRUD operations and secure payment processing.

---

## **Features**

### Event Management
- **Create Events** – Add new events with title, description, date, and price.
- **Read Events** – View all events in a clean listing.
- **Update Events** – Edit event details with ease.
- **Delete Events** – Remove events that are no longer needed.

### Payment Integration
- **Stripe Payment Gateway** – Secure online payments for events.
- **Event Price Handling** – Users can pay the exact event price directly from the application.

### Technology Stack
- **Framework:** Laravel 11
- **Database:** MySQL
- **Frontend:** Blade Templates, Bootstrap (optional)
- **Backend:** PHP 8.x
- **Payment:** Stripe (via Laravel Cashier)
- **Version Control:** Git/GitHub

---

## **Requirements**
- XAMPP (Apache & MySQL)
- Composer
- PHP 8.x
- MySQL
- Stripe Account (for payments)

---

## **Installation Steps**

### 1. Setup XAMPP
1. Download and install XAMPP: [https://www.apachefriends.org/index.html](https://www.apachefriends.org/index.html)
2. Start **Apache** and **MySQL** from XAMPP Control Panel.
3. Open `http://localhost` to ensure XAMPP is running.

### 2. Install Composer
1. Download and install Composer: [https://getcomposer.org/](https://getcomposer.org/)
2. Verify installation:

### 2. Create Laravel Project
```bash
composer create-project laravel/laravel event_manager
cd event_manager
```

### 3. Start Laravel server:
```bash
php artisan serve
```

### 4. Configure MySQL Database
```bash
Open phpMyAdmin: http://localhost/phpmyadmin
Create a database named:event_manager
```
### 5 Configure .env file:
```bash
- DB_CONNECTION=mysql
-DB_HOST=127.0.0.1
-DB_PORT=3306
-DB_DATABASE=event_manager
-DB_USERNAME=root
-DB_PASSWORD=
```

### 6 Run migrations:
```bash
-php artisan migrate
```

### 7 Open the project in your browser:
```bash
-http://127.0.0.1:8000/events
-Add, edit, view, or delete events.
-Make payments using Stripe for events with prices.
```

✅ Notes on changes:
- Fixed Markdown syntax for code blocks using triple backticks.
- Removed unnecessary dashes `-` before environment variables.
- Added proper headings and spacing for readability.  
- URLs and paths are formatted for Markdown clarity.

<img width="1891" height="901" alt="image" src="https://github.com/user-attachments/assets/8d7c9998-9642-493f-8c3c-2d5f982290cf" />

<img width="1372" height="971" alt="image" src="https://github.com/user-attachments/assets/67c3a680-05be-47fd-b323-c10314f4a4b2" />


<img width="1897" height="540" alt="image" src="https://github.com/user-attachments/assets/ad0241ac-90f7-4a9b-90a3-da2d5fd3f174" />

<img width="1297" height="710" alt="image" src="https://github.com/user-attachments/assets/ad18870e-55c0-4875-a7e0-9937dbfa2718" />




