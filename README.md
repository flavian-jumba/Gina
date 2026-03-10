# NGO Management System

A comprehensive NGO management platform built with **Laravel 12**, **Filament 5**, and **Tailwind CSS 4**. It covers Fundraising (Donors & Donations), Programs (Projects, Beneficiaries & Expenses), and People (Volunteers) — with a live KPI dashboard.

---

## Table of Contents

- [Features](#features)
- [Tech Stack](#tech-stack)
- [Requirements](#requirements)
- [Setup on Linux](#setup-on-linux)
- [Setup on Windows](#setup-on-windows)
- [Environment Configuration](#environment-configuration)
- [Database Setup](#database-setup)
- [Running the Application](#running-the-application)
- [Default Admin Credentials](#default-admin-credentials)
- [Production Deployment](#production-deployment)
- [Useful Artisan Commands](#useful-artisan-commands)
- [Troubleshooting](#troubleshooting)

---

## Features

| Module | Description |
|---|---|
| **Donors** | Manage donor profiles and contact details |
| **Donations** | Track donations linked to donors and projects |
| **Projects** | Manage programmes with status tracking |
| **Beneficiaries** | Record people supported by each project |
| **Expenses** | Track per-project expenditure by category |
| **Volunteers** | Manage volunteer profiles and availability |
| **Dashboard** | Live KPIs: funds raised, expenses, active projects, beneficiary count, monthly chart |

---

## Tech Stack

| Layer | Technology |
|---|---|
| Framework | Laravel 12 |
| Admin Panel | Filament 5 |
| CSS | Tailwind CSS 4 |
| Frontend Bundler | Vite 7 |
| PHP Minimum | 8.2 |
| Database | MySQL 8+ / MariaDB 10.4+ |
| Testing | Pest 4 |

---

## Requirements

### All Platforms

- **PHP** >= 8.2 with extensions: `pdo`, `pdo_mysql`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`, `curl`, `fileinfo`, `bcmath`
- **Composer** >= 2.x
- **Node.js** >= 18.x and **npm** >= 9.x
- **MySQL** >= 8.0 or **MariaDB** >= 10.4

---

## Setup on Linux

### 1. Install System Dependencies

**Ubuntu / Debian:**
```bash
sudo apt update && sudo apt upgrade -y

# PHP 8.4 + required extensions
sudo add-apt-repository ppa:ondrej/php -y
sudo apt install -y php8.4 php8.4-cli php8.4-fpm php8.4-mysql php8.4-mbstring \
  php8.4-xml php8.4-curl php8.4-zip php8.4-bcmath php8.4-tokenizer php8.4-fileinfo

# Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Node.js 20
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install -y nodejs

# MySQL
sudo apt install -y mysql-server
sudo mysql_secure_installation
```

**Fedora / RHEL / Rocky Linux:**
```bash
sudo dnf install -y php php-cli php-pdo php-mysqlnd php-mbstring php-xml \
  php-curl php-zip php-bcmath php-json php-fileinfo

curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

curl -fsSL https://rpm.nodesource.com/setup_20.x | sudo bash -
sudo dnf install -y nodejs mysql-server
sudo systemctl enable --now mysqld
```

### 2. Clone the Repository

```bash
git clone https://github.com/your-org/ngo-management.git
cd ngo-management
```

### 3. Install PHP & JS Dependencies

```bash
composer install
npm install
```

### 4. Configure Environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` with your database credentials — see [Environment Configuration](#environment-configuration).

### 5. Create the Database

```bash
mysql -u root -p
```
```sql
CREATE DATABASE ngo_management CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'ngo_user'@'localhost' IDENTIFIED BY 'your_password';
GRANT ALL PRIVILEGES ON ngo_management.* TO 'ngo_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### 6. Run Migrations & Seed

```bash
php artisan migrate
php artisan db:seed
```

### 7. Build Frontend Assets

```bash
npm run build
```

### 8. Set Storage Permissions

```bash
chmod -R 775 storage bootstrap/cache
chown -R $USER:www-data storage bootstrap/cache
```

### 9. Start the Development Server

```bash
composer run dev
```

The app will be available at **http://localhost:8000/admin**

---

## Setup on Windows

### 1. Install Required Tools

#### Option A — Laravel Herd (Recommended)

1. Download and install **[Laravel Herd](https://herd.laravel.com/windows)** — bundles PHP, Composer, and a local server automatically.
2. Download and install **[Node.js LTS](https://nodejs.org/)** (includes npm).
3. Download and install **[MySQL Installer](https://dev.mysql.com/downloads/installer/)** — choose "Developer Default" and follow the setup wizard.

#### Option B — Laragon (Full Local Stack)

1. Download **[Laragon](https://laragon.org/download/)** — includes Nginx/Apache, PHP 8.x, MySQL, and phpMyAdmin. Recommended over XAMPP.
2. Download and install **[Composer](https://getcomposer.org/Composer-Setup.exe)**.
3. Download and install **[Node.js LTS](https://nodejs.org/)**.
4. Start Laragon and ensure Apache/Nginx and MySQL are running (green icons in the tray).

### 2. Open a Terminal

Use **PowerShell**, **Windows Terminal**, or **Git Bash**. All commands below work in any of them.

### 3. Clone the Repository

```powershell
git clone https://github.com/your-org/ngo-management.git
cd ngo-management
```

### 4. Install PHP & JS Dependencies

```powershell
composer install
npm install
```

### 5. Configure Environment

```powershell
copy .env.example .env
php artisan key:generate
```

Open `.env` in VS Code, Notepad++, or any editor and update the database block — see [Environment Configuration](#environment-configuration).

### 6. Create the Database

**Using Laragon → phpMyAdmin:**
1. Open Laragon tray → click **Database** → phpMyAdmin opens in the browser.
2. Click **New** in the left sidebar.
3. Database name: `ngo_management`, Collation: `utf8mb4_unicode_ci` → click **Create**.

**Using MySQL CLI (PowerShell):**
```powershell
mysql -u root -p
```
```sql
CREATE DATABASE ngo_management CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'ngo_user'@'localhost' IDENTIFIED BY 'your_password';
GRANT ALL PRIVILEGES ON ngo_management.* TO 'ngo_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### 7. Run Migrations & Seed

```powershell
php artisan migrate
php artisan db:seed
```

### 8. Build Frontend Assets

```powershell
npm run build
```

### 9. Start the Development Server

```powershell
composer run dev
```

The app will be available at **http://localhost:8000/admin**

> **Laragon tip:** Place the project folder inside `C:\laragon\www\ngo-management` and Laragon will serve it at `http://ngo-management.test` automatically — no port needed.

---

## Environment Configuration

Update the following keys in your `.env` file:

```dotenv
APP_NAME="NGO Management"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ngo_management
DB_USERNAME=ngo_user
DB_PASSWORD=your_password

MAIL_MAILER=log          # Use 'smtp' in production
SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=sync    # Use 'database' or 'redis' in production
```

---

## Database Setup

### Fresh install — migrate and seed together

```bash
php artisan migrate:fresh --seed
```

### Migrations only (no demo data)

```bash
php artisan migrate
```

### Seed only (after migrations are already run)

```bash
php artisan db:seed
```

The seeder creates the following demo data:

| Table | Records |
|---|---|
| Projects | 10 |
| Donors | 30 |
| Volunteers | 20 |
| Donations | 60 |
| Beneficiaries | 80 |
| Expenses | 50 |
| Admin user | 1 |

---

## Running the Application

### Development — all services together

```bash
composer run dev
```

This concurrently starts:
- PHP development server (`php artisan serve`)
- Queue worker (`php artisan queue:listen`)
- Log watcher (`php artisan pail`)
- Vite HMR (`npm run dev`)

### Or start each service individually

```bash
# Terminal 1 — PHP server
php artisan serve

# Terminal 2 — Vite (live reload)
npm run dev
```

---

## Default Admin Credentials

| Field | Value |
|---|---|
| **URL** | http://localhost:8000/admin |
| **Email** | admin@ngo.test |
| **Password** | password |

> Change the password immediately before going to production.

To create additional admin users interactively:
```bash
php artisan make:filament-user
```

---

## Production Deployment

### 1. Set Production Environment

```dotenv
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com
```

### 2. Install Dependencies (no dev packages)

```bash
composer install --optimize-autoloader --no-dev
npm ci
npm run build
```

### 3. Optimise Laravel Caches

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache
php artisan icons:cache
php artisan filament:optimize
```

### 4. Run Migrations

```bash
php artisan migrate --force
```

### 5. Set File Permissions (Linux servers)

```bash
sudo chown -R www-data:www-data storage bootstrap/cache
sudo chmod -R 775 storage bootstrap/cache
```

### 6. Nginx Server Block (Linux)

```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /var/www/ngo-management/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;
    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.4-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

Enable HTTPS by running:
```bash
sudo apt install -y certbot python3-certbot-nginx
sudo certbot --nginx -d your-domain.com
```

### 7. Queue Worker with Supervisor (Linux)

Install Supervisor:
```bash
sudo apt install -y supervisor
```

Create `/etc/supervisor/conf.d/ngo-worker.conf`:
```ini
[program:ngo-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/ngo-management/artisan queue:work --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
user=www-data
numprocs=2
redirect_stderr=true
stdout_logfile=/var/www/ngo-management/storage/logs/worker.log
stopwaitsecs=3600
```

Apply and start:
```bash
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start ngo-worker:*
```

---

## Useful Artisan Commands

```bash
# Wipe and re-seed the entire database
php artisan migrate:fresh --seed

# Create a new Filament admin user interactively
php artisan make:filament-user

# Clear all caches (use after config changes in dev)
php artisan optimize:clear

# Run the full test suite
php artisan test --compact

# List all registered routes
php artisan route:list

# Tail application logs in real time
php artisan pail

# Check application status summary
php artisan about
```

---

## Troubleshooting

| Problem | Solution |
|---|---|
| `php artisan` not found | Ensure PHP is in your system `PATH` |
| Blank page / 500 error | Run `php artisan optimize:clear`, check `storage/logs/laravel.log` |
| Vite assets not loading | Run `npm run build` or start `npm run dev` |
| Database connection refused | Verify MySQL is running and `.env` credentials are correct |
| `permission denied` on storage (Linux) | Run `chmod -R 775 storage bootstrap/cache` |
| `Class not found` after pulling changes | Run `composer dump-autoload` |
| Filament panel not loading | Run `php artisan filament:upgrade` then `php artisan optimize:clear` |
| Windows: `composer` not found | Re-run the Composer installer and check "Add to PATH" option |
| Windows: MySQL port conflict | Change `DB_PORT` in `.env` or stop conflicting services in Services (`services.msc`) |
# Gina
