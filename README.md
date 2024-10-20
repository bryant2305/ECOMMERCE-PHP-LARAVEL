
## Prerequisites

Make sure you have the following tools installed on your system:

- **PHP** >= 8.0
- **Composer**
- **MySQL**
- **Node.js** >= 12.x and **npm** or **yarn**

**Install PHP dependencies**
composer install

**Install Node.js dependencies**
npm install

**Configure the .env file**
Copy the .env.example file and rename it to .env:

**Open the .env file and update the database connection details:**

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

**Run migrations and seeders**
php artisan migrate --seed

**Compile frontend assets**
npm run dev

**Running the Project**
php artisan serve
