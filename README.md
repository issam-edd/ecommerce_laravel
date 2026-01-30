# 🛒 Full-Stack E-Commerce Website (Laravel)

## 📌 Project Overview
This is a full-stack e-commerce web application built with Laravel.
The platform allows customers to browse products, add them to a shopping cart, place orders, and pay securely using PayPal.
An admin dashboard is included to manage products, categories, orders, and users.

This project simulates a real online store with complete order and payment flow.

---

## 🚀 Features

### 🧑‍💻 Customer Side
- Browse products by category
- View product details
- Add / remove products from shopping cart
- Manage delivery address
- Checkout and pay using **PayPal**
- Order confirmation

### 🛠 Admin Dashboard
- Secure admin authentication
- Full CRUD for products and categories
- Manage orders and order status
- View customers and order history
- Dashboard overview (products, orders, users)

---

## 🧰 Tech Stack
- **Backend:** Laravel (PHP)
- **Frontend:** Blade, HTML, CSS, JavaScript
- **Database:** MySQL
- **Payment Gateway:** PayPal
- **Authentication:** Laravel Auth
- **Architecture:** MVC

---

## 🗂 Database Structure (Summary)
- Users
- Products
- Categories
- Orders
- Order items
- Addresses
- Payments

---

## 📷 Screenshots

### Homepage
![Homepage](ecom-website-screenshots/home.png)

### Product Details
![Product Details](ecom-website-screenshots/detail_product.png)

### Add To Card
![Add To Card](ecom-website-screenshots/add_to_card.png)

### Place Order
![Place Order](ecom-website-screenshots/place_order.png)

### Login/Create Account
![Login](ecom-website-screenshots/log_in.png)
![create account](ecom-website-screenshots/create_profile.png)

### Verification Email
![Verification Email](ecom-website-screenshots/verify_gmail.png)

### Verification Email Button
![Verification Email Button](ecom-website-screenshots/verify_email_button.png)

### Add Address
![Add Address](ecom-website-screenshots/add_adress.png)

### PayPal Payment
![PayPal Payment](ecom-website-screenshots/paypal_payment.png)
![Signt To Your Pyaple Account](ecom-website-screenshots/signt_to_your_pyaple_account.png)
![Payment](ecom-website-screenshots/payment.png)
![Success Payment](ecom-website-screenshots/success_payment.png)

### Admin Dashboard
![Dashboard](ecom-website-screenshots/dashboard.png)

### OrderS List
![OrderS List](ecom-website-screenshots/order_list_dashboard.png)

---

## ⚙️ Installation & Setup

```bash
git clone https://github.com/your-username/ecommerce-laravel.git
cd ecommerce-laravel
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
