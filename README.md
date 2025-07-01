# 📘 README

## ✅ Requirements
- PHP 8.1 or higher
- Composer
- MySQL

## ⚙️ Local Installation Steps

### 1. Clone the repository

```bash
git clone https://github.com/pabloInge/clearit
cd clearit
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Create the `.env` file

```bash
cp .env.example .env
```

### 4. Configure the `.env` file with your local database settings

Make sure you have a database named `clearit` created in MySQL.

Update the following lines:

```
APP_NAME=Clearit
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=clearit
DB_USERNAME=root
DB_PASSWORD=secret
```

### 5. Generate the application key

```bash
php artisan key:generate
```

### 6. Run migrations and seeders

This will create all the necessary tables and insert default roles and users.

```bash
php artisan migrate --seed
```

### 7. Start the local server

```bash
php artisan serve
```

Your API should now be running at:

```
http://localhost:8000
```

---

## 👥 Test Users

**Agent**  
Email: `agent@agent.com`  
Password: `agent`  
Role: `agent`

**User**  
Email: `user@user.com`  
Password: `user`  
Role: `user`

---

## ✅ Ready to Use

You can now use the API with tools like Postman.
