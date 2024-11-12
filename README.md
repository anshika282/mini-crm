<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Mini CRM 

A lightweight CRM application designed for efficient customer and company management, featuring streamlined data entry, easy navigation, and customizable forms. This project is built using PHP, Laravel, and Bootstrap to deliver a responsive and user-friendly interface. 

## Features
- **Company Management**  
  - CRUD for company profiles.
  - Store details such as company name, address, email, and contact numbers.
  - Upload company logos with image storage handling.

- **Customer Management**  
  - CRUD for customer information.
  - Include customer-specific details like name, email, phone, and company association.

- **File Storage**
  - for the image uploads of the company and employee.  


## Prerequisites

- **PHP** >= 8.0
- **Laravel** >= 9.x
- **Composer**
- **MySQL** or other compatible database


## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/anshika282/mini-crm.git
   cd mini-crm

2. **Install dependencies**
   ```bash
   composer install
   npm install && npm run dev

3. **Set up environment variables**
   ```bash
   edit the env variables for the database connections.

4. **Run migrations:**
  ```bash
   php artisan migrate

5. **For the database seeding:**
   ```bash
   php artisan db:seed

6. **Storage Link**
   ```bash
    php artisan storage:link
    //if problem occurs : change the R/W mode of the storage.

7. **Server Start**
    ```bash
    php artisan serve

Note : start url is /regiter or /login







