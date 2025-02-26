# URL Shortener with Analytics (Shortify)

A Laravel-based URL shortener application that allows users to shorten long URLs and track analytics, including total clicks, IP addresses, and timestamps.

## Features

### URL Shortening
- Convert long URLs into short, unique codes.
- Ensure valid URLs with input validation.
- Expiry Checking.

### Redirection
- Redirect users to the original URL when they visit the shortened URL.

### Analytics
- Track total clicks for each shortened URL.
- View detailed analytics, including:
  - IP addresses
  - User agents
  - Click timestamps

### Professional Design
- Clean and responsive user interface built with Bootstrap 5.

### Database Integration
- Uses MySQL to store URLs and analytics data securely.

### Security
- Input validation to prevent malicious entries.

## Technologies Used
- **Backend:** Laravel 12
- **Frontend:** Bootstrap 5
- **Database:** MySQL
- **Other Tools:** Composer, Blade Templates, Eloquent ORM

## Installation

### Prerequisites
Ensure you have the following installed:
- PHP 8.1 or higher
- Composer
- MySQL
- Laravel CLI (optional)

### Steps

#### 1. Clone the Repository
```bash
git clone https://github.com/mdarmancse/shortify.git
```

#### 2. Install Dependencies
```bash
composer install
```

#### 3. Set Up Environment
Copy the `.env.example` file and rename it to `.env`:
```bash
cp .env.example .env
```
Update the `.env` file with your database credentials:
```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=shortify
DB_USERNAME=root
DB_PASSWORD=your_password
```

#### 4. Run Migrations
```bash
php artisan migrate
```

#### 5. Serve the Application
```bash
php artisan serve
```

#### 6. Access the Application
Open your browser and visit:
```
http://localhost:8000
```

## Usage

### Shorten a URL
1. Visit the homepage.
2. Enter a long URL in the input field.
3. Click **Shorten URL**.
4. The shortened URL will be displayed.

### View Analytics
1. Click the **View Analytics** button next to a shortened URL.
2. View the total clicks and detailed analytics, including IP addresses, user agents, and timestamps.

### Redirect to Original URL
1. Visit a shortened URL (e.g., `abc123`).
2. You will be redirected to the original long URL.


---

### 📫 Need Help?
For any issues, feel free to create an issue on [GitHub](https://github.com/mdarmancse/shortify/issues).

