# 🎓 Sukmabelajar2

> A modern Learning Management System (LMS) built with Laravel for managing classrooms, learning materials, assessments, and student progress.

![Laravel](https://img.shields.io/badge/Laravel-12-red?logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.3-blue?logo=php)
![Livewire](https://img.shields.io/badge/Livewire-3-purple)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-4-38BDF8?logo=tailwindcss)
![License](https://img.shields.io/badge/License-MIT-green)

---

## 📖 Overview

**Sukmabelajar2** is a web-based Learning Management System (LMS) developed as a university thesis project. It provides a centralized platform for managing online learning, enabling instructors to organize educational content while allowing students to access learning materials, complete assessments, and monitor their learning progress.

The project focuses on delivering a clean, responsive, and user-friendly learning experience while following Laravel development best practices.

---

## ✨ Features

### 👨‍🎓 Student

- Authentication
- Join classrooms
- View learning materials
- Complete quizzes and tests
- Track learning progress
- Responsive learning interface

### 👨‍🏫 Instructor

- Create classrooms
- Manage learning modules
- Upload materials
- Create quizzes
- Monitor student progress

### 👨‍💼 Administrator

- User management
- Classroom management
- Module management
- Role & permission management
- System administration

---

# 🛠 Tech Stack

## Backend

- Laravel 12
- PHP 8.3+
- MySQL

## Frontend

- Blade
- Livewire
- Tailwind CSS
- Vite

## Development Tools

- Composer
- npm
- Git

---

# 📂 Project Structure

```
app/
├── Http/
├── Livewire/
├── Models/
├── Providers/

bootstrap/

config/

database/
├── migrations/
├── seeders/

public/

resources/
├── css/
├── js/
├── views/

routes/

storage/

tests/
```

---

# 📋 Prerequisites

Before running the project, make sure you have installed:

- PHP 8.3 or higher
- Composer
- Node.js 20 LTS or newer
- npm
- MySQL 8+
- Git

Verify your installation:

```bash
php -v
composer -V
node -v
npm -v
mysql --version
git --version
```

---

# 🚀 Local Installation

## 1. Clone the Repository

```bash
git clone https://github.com/BismaBendesa/sukmabelajar2.git

cd sukmabelajar2
```

---

## 2. Install PHP Dependencies

```bash
composer install
```

---

## 3. Install JavaScript Dependencies

```bash
npm install
```

---

## 4. Create Environment File

Windows

```bash
copy .env.example .env
```

Linux / macOS

```bash
cp .env.example .env
```

---

## 5. Configure Environment

Open `.env` and update your database configuration.

Example:

```env
APP_NAME="Sukmabelajar2"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sukmabelajar2
DB_USERNAME=root
DB_PASSWORD=
```

---

## 6. Generate Application Key

```bash
php artisan key:generate
```

---

## 7. Run Database Migration

```bash
php artisan migrate
```

If your project includes database seeders:

```bash
php artisan migrate --seed
```

---

## 8. Create Storage Link

```bash
php artisan storage:link
```

---

## 9. Start Vite Development Server

```bash
npm run dev
```

Leave this terminal running.

---

## 10. Start Laravel Server

Open another terminal.

```bash
php artisan serve
```

Application URL:

```
http://127.0.0.1:8000
```

---

# 👥 User Roles

| Role | Description |
|------|-------------|
| Admin | Full system management |
| Instructor | Manage classrooms and learning content |
| Student | Participate in online learning |

---

# 📚 Core Modules

## Authentication

- Login
- Logout
- Registration
- Role-based access control

---

## Classroom

- Create classroom
- Manage members
- Organize learning activities

---

## Learning Modules

- Learning materials
- Reading duration
- Attachments
- Videos
- Prerequisite modules

---

## Assessments

- Multiple-choice quizzes
- Time-limited examinations
- Automatic scoring

---

## Progress Tracking

- Material completion
- Quiz completion
- Learning progress
- Overall course progress

---

# 🧰 Useful Artisan Commands

Clear caches

```bash
php artisan optimize:clear
```

Generate application key

```bash
php artisan key:generate
```

Run migration

```bash
php artisan migrate
```

Fresh migration

```bash
php artisan migrate:fresh
```

Fresh migration with seed

```bash
php artisan migrate:fresh --seed
```

List routes

```bash
php artisan route:list
```

Create storage link

```bash
php artisan storage:link
```

---

# 💻 Development Workflow

Whenever you pull new changes:

```bash
git pull

composer install

npm install

php artisan migrate

php artisan optimize:clear
```

Run the development server:

```bash
php artisan serve
```

Run Vite:

```bash
npm run dev
```

---

# 📷 Screenshots

> Add screenshots to showcase the application.

```
docs/
└── images/
    ├── login.png
    ├── dashboard.png
    ├── classroom.png
    ├── module.png
    └── progress.png
```

Example:

```markdown
![Dashboard](docs/images/dashboard.png)
```

---

# 🌳 Branching Strategy

```
main
│
├── develop
│
├── feature/*
│
└── hotfix/*
```

### Branches

| Branch | Purpose |
|----------|----------|
| main | Production-ready code |
| develop | Integration branch |
| feature/* | Individual feature development |
| hotfix/* | Production fixes |

---

# 🤝 Contributing

1. Fork the repository
2. Create a feature branch

```bash
git checkout -b feature/your-feature
```

3. Commit your changes

```bash
git commit -m "Add your feature"
```

4. Push your branch

```bash
git push origin feature/your-feature
```

5. Open a Pull Request

---

# 🐞 Troubleshooting

## Vite Manifest Not Found

```bash
npm install
npm run dev
```

---

## Missing Application Key

```bash
php artisan key:generate
```

---

## Database Connection Error

Check:

- MySQL server is running
- `.env` database credentials
- Database exists

---

## Images Not Loading

```bash
php artisan storage:link
```

---

## Permission Issues (Linux/macOS)

```bash
chmod -R 775 storage bootstrap/cache
```

---

# 📝 Future Improvements

- Course enrollment
- Certificates
- Assignment submission
- Discussion forum
- Real-time notifications
- Video conferencing integration
- Learning analytics dashboard
- Mobile application

---

# 📄 License

This project is licensed under the **MIT License**.

---

# 👨‍💻 Author

**Bisma Bendesa**

Computer Science Student — Udayana University

- 🌐 GitHub: https://github.com/BismaBendesa
- 🎨 UI/UX Designer
- 💻 Full-stack Laravel Developer

---

## ⭐ Support

If you find this project useful, consider giving it a **⭐ Star** on GitHub. It helps others discover the project and supports future development.
