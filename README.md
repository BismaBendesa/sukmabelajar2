Sukmabelajar2

A modern Learning Management System (LMS) built with Laravel for managing classrooms, learning materials, quizzes, and student progress.






📖 Overview

Sukmabelajar2 is a web-based Learning Management System (LMS) developed as a university thesis project.

The system enables instructors to organize learning content while allowing students to access materials, complete assessments, and monitor their learning progress.

Key Features
Authentication
Role-based Authorization
Classroom Management
Module Management
Learning Materials
Quiz / Test Module
Student Progress Tracking
Dashboard
Admin Panel
Responsive Interface
🛠 Tech Stack

Backend

Laravel
PHP 8.3
MySQL

Frontend

Blade
Tailwind CSS
Livewire
Vite

Development

Composer
npm
Git
📂 Project Structure
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
tests/
⚙ Requirements
PHP 8.3+
Composer
Node.js 20+
npm
MySQL 8+
Git
🚀 Installation
git clone https://github.com/BismaBendesa/sukmabelajar2.git

cd sukmabelajar2

Install dependencies

composer install

npm install

Create environment

cp .env.example .env

Generate key

php artisan key:generate

Configure database

DB_DATABASE=sukmabelajar2
DB_USERNAME=root
DB_PASSWORD=

Run migration

php artisan migrate

Seed database (if available)

php artisan db:seed

Create storage symlink

php artisan storage:link

Start development servers

Terminal 1

php artisan serve

Terminal 2

npm run dev

Application

http://127.0.0.1:8000
👥 Default Roles
Role	Description
Admin	Full system administration
Instructor	Manage classrooms and learning content
Student	Access enrolled courses and complete activities
📚 Core Modules
Classroom
Create classrooms
Manage students
Assign instructors
Learning Module
Learning materials
Attachments
Video support
Reading duration
Assessment
Multiple choice tests
Timer support
Automatic grading
Progress Tracking
Material completion
Quiz completion
Overall course progress
🧰 Useful Commands
php artisan optimize:clear
php artisan migrate:fresh --seed
php artisan route:list
npm run dev
📷 Screenshots
docs/images/login.png

docs/images/dashboard.png

docs/images/classroom.png

docs/images/module.png

(Add screenshots as the project evolves.)

🌱 Git Workflow
main
│
├── develop
│
├── feature/*
│
└── hotfix/*
🤝 Contributing
Fork the repository
Create a feature branch
Commit your changes
Push to your fork
Open a Pull Request
📄 License

This project is licensed under the MIT License.

👨‍💻 Author

Bisma Bendesa

Computer Science Student — Udayana University
UI/UX Designer
Full-stack Laravel Developer
