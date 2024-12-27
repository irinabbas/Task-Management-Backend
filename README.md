# Task Management Backend

This is the backend of the **Task Management Backend** application built using **Laravel**. It serves as the API that allows users to create, update, and manage tasks within the system.

## Features

- **User Authentication**: Secure user registration and login functionality.
- **Task Management**: Users can create, update, delete, and view tasks list.
- **Filter**: Filter using the due dates and status.
- **API Endpoints**: A RESTful API that can be consumed by a frontend application.

## Installation

Follow these steps to set up the project locally:

Clone the repository

git clone https://github.com/irinabbas/Task-Management-Backend.git

cd Task-Management-Backend

Copy the .env.example file to .env:

cp .env.example .env

Run the following command to generate the application key:

php artisan key:generate

Update the .env file with your database credentials:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_management
DB_USERNAME=root
DB_PASSWORD=

Run the migrations to create the necessary tables in the database:
php artisan migrate

To start the Laravel development server, run:
php artisan serve
