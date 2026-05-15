# Vehicle Booking Management System

## Description

Vehicle Booking Management System is a web-based application built using Laravel to manage company vehicle reservations efficiently.

The application supports:

* Vehicle management
* Driver management
* Vehicle booking
* Multi-level approval workflow
* Dashboard analytics
* Excel export
* Activity logging
* Role-based authorization
* Booking conflict validation

---

# Features

## Authentication

* Login
* Logout

---

## Role Management

### Admin

* Manage vehicles
* Manage drivers
* Create bookings
* Export booking reports
* View dashboard analytics
* View activity logs

### Approver

* Approve booking
* Reject booking

---

# Approval Workflow

```text id="hbp2m8"
Pending
↓
Approved Level 1
↓
Approved
```

Or:

```text id="bqx4v7"
Pending
↓
Rejected
```

---

# Booking Validation

The system prevents:

* Vehicle double booking
* Driver double booking

---

# Dashboard Features

* Total vehicles
* Available vehicles
* Total drivers
* Pending bookings
* Approved bookings
* Rejected bookings
* Booking statistics chart

---

# Export Excel

Supports:

* Booking export to Excel
* Professional formatting
* Auto column width
* Custom headings

---

# Activity Log

Tracks important activities:

* Create booking
* Approve booking
* Reject booking
* Export booking report

---

# Tech Stack

* PHP 8.2
* Laravel 12
* MySQL / MariaDB
* Tailwind CSS
* Chart.js
* Laravel Excel

---

# Installation

## 1. Clone Repository

```bash id="u8d3n1"
git clone <repository-url>
```

---

## 2. Enter Project Directory

```bash id="w7m2q4"
cd vehicle-booking
```

---

## 3. Install PHP Dependencies

```bash id="r4k9m2"
composer install
```

---

## 4. Install Frontend Dependencies

```bash id="v5n8m1"
npm install
```

---

## 5. Copy Environment File

```bash id="q2m7v5"
cp .env.example .env
```

---

## 6. Generate Application Key

```bash id="m1k8q3"
php artisan key:generate
```

---

## 7. Configure Database

Edit `.env` file:

```env id="x7n4m2"
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vehicle_booking
DB_USERNAME=root
DB_PASSWORD=
```

---

## 8. Run Migration and Seeder

```bash id="k8m3q1"
php artisan migrate:fresh --seed
```

---

## 9. Run Vite

```bash id="n6v2m5"
npm run dev
```

---

## 10. Run Laravel Server

```bash id="p4m8q7"
php artisan serve
```

---

# Default Accounts

## Admin

```text id="r9m2v4"
Email    : admin@mail.com
Password : password
```

---

## Approver 1

```text id="u3n8k5"
Email    : approver1@mail.com
Password : password
```

---

## Approver 2

```text id="x1m7q2"
Email    : approver2@mail.com
Password : password
```

---

# Main Routes

| Route          | Description        |
| -------------- | ------------------ |
| /dashboard     | Dashboard          |
| /vehicles      | Vehicle Management |
| /drivers       | Driver Management  |
| /bookings      | Booking Management |
| /approvals     | Booking Approval   |
| /activity-logs | Activity Logs      |

---

# Roles

| Role     | Access               |
| -------- | -------------------- |
| Admin    | Full system access   |
| Approver | Approval access only |

---

# Project Structure

```text id="t7m4q1"
app/
├── Http/
│   ├── Controllers/
│   ├── Middleware/
│
├── Models/
│
├── Exports/
│
resources/
├── views/
│
database/
├── migrations/
├── seeders/
```

---

# Author

Developed by Dzakky Budiman
