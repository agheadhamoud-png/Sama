# SAMA - Services Accompagnement Migrants Auvergne

Website project for the non-profit SAMA, built for SAE 301.

## Project Overview
This project is a custom responsive website with a bespoke Back-office (MVC Architecture, No CMS).
It allows the association to present its missions, workshops, and news, and allows administrators to manage content.

## Features
- **Frontend**:
  - Responsive design (Desktop/Mobile).
  - Accessible (Skip links, semantic HTML, contrast).
  - Dynamic content for Workshops and News.
  - Category filtering for Workshops.
  - Contact form.
- **Backend (Back-office)**:
  - Secure Login/Logout.
  - Dashboard with overview of content.
  - CRUD (Create, Read, Update, Delete) for Workshops.
  - CRUD for News/Projects.

## Tech Stack
- **Frontend**: HTML5, CSS3 (Variables, Flexbox/Grid), Vanilla JS.
- **Backend**: PHP 8+ (Object Oriented), MVC Pattern.
- **Database**: MySQL / MariaDB.

## Installation & Setup

1.  **Requirements**:
    - XAMPP (or WAMP/MAMP) with Apache and MySQL.
    - PHP 7.4 or higher.

2.  **Installation**:
    - Clone or place the project folder `Sama` into `htdocs` (e.g., `C:\xampp\htdocs\Sama`).

3.  **Database**:
    - Create a database named `sama_db`.
    - Import the script `database/schema.sql` (using PHPMyAdmin or CLI).
    - Default Admin User:
        - Username: `admin`
        - Password: `password` (hashed in DB)

4.  **Configuration**:
    - Check `src/Config/Database.php` if you need to change DB credentials (default is `root` / empty password).

5.  **Running**:
    - Start Apache and MySQL via XAMPP Control Panel.
    - Access the site: `http://localhost/Sama/public/`
    - Access Admin: `http://localhost/Sama/public/admin/login`

## Directory Structure
- `/public`: Publicly accessible files (index.php, CSS, JS, Images).
- `/src`: Application source code.
    - `/Config`: Database configuration.
    - `/Controllers`: Logic handling.
    - `/Core`: Router, Base Controller.
    - `/Models`: Database interactions.
    - `/Views`: HTML Templates.
- `/database`: SQL scripts.

## Author
Developed for SAE 301.
