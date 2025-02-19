# Worksheets App
A Laravel application with Blade-based authentication and a Vue-powered dashboard for professors and students.

##vFeatures
Authentication: Login, register, and profile management using Laravel Breeze (Blade).
Role-Based Dashboard:
Professor: Create, edit, delete, and view worksheets.
Student: View and complete available worksheets.

##Requirements
PHP >= 8.1
Composer
Node.js & npm
MySQL

##Installation
Clone the Repository
git clone https://github.com/<username>/<repo>.git
cd <repo>

Install PHP Dependencies
composer install
Install Node Dependencies
npm install

For development, run:
npm run dev
Start the Development Server
php artisan serve
##Access the Application
Open your browser and visit http://127.0.0.1:8000.

Guests will see the Welcome page.
Authenticated users will be redirected to the Dashboard.
