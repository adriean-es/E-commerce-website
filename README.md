# Setup Guidegit 

## 1. Install PHP dependencies (Laravel)
composer install

## 2. Install Node.js dependencies (Vite, Tailwind, etc.)
npm install

## 3. Copy the environment file
cp .env.example .env

## 4. Generate the app key
php artisan key:generate

## 5. Configure the .env file (DB credentials, etc.)
## Then run migrations:
php artisan migrate

## 6. Run the dev server (both Laravel + Vite)
php artisan serve
npm run dev
