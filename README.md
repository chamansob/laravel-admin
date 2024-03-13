<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## About Laravel Quiz Management System

The Laravel Quiz Management System is a web application developed using the Laravel PHP framework. It provides a comprehensive solution for creating, managing, and conducting quizzes online. Whether you are an educational institution, a training center, or a company looking to assess employee knowledge, this system offers a user-friendly interface for seamless quiz management.

## Features
-[User Authentication:] Secure registration and login system for both administrators and participants.
Quiz Creation: Easily create quizzes with customizable settings such as duration, number of questions, and difficulty level.
-[Question Types]: Support for various question types, including multiple-choice, true/false, and open-ended questions.
[Category Management: Organize quizzes into categories for better navigation and organization.
[Quiz Attempt Tracking:] Monitor and review participants' quiz attempts, including scores and time taken.
[Real-time Results:] Instantaneous display of results upon quiz completion.
[Admin Dashboard:] A comprehensive dashboard for administrators to manage quizzes, users, and view statistics.
[Responsive Design:] Accessible and user-friendly interface designed to work seamlessly across different devices.

## Installation

Clone the Repository:
git clone https://github.com/your-username/laravel-quiz-management-system.git

Install Dependencies:
cd laravel-quiz-management-system
composer install

Copy Environment File:
cd .env.example .env

Generate Application Key:
php artisan key:generate

Create tables:
php artisan migrate

Insert data by seeder:
php artisan db:seed

Start Development Server:
php artisan serve

## Installation

Access the Application backend:
Open your browser and navigate to http://localhost:8000/admin/login.

## Usage
Admin Access:

Access the admin dashboard by navigating to /admin.
Default admin credentials:
Username: admin@gmail.com
Password: 12345678