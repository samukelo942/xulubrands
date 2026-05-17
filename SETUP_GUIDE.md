# XuluBrands Database Setup Guide

## Step 1: Start XAMPP
1. Open **XAMPP Control Panel**
2. Click **Start** for:
   - Apache
   - MySQL

Wait a few seconds for both services to start (should turn green).

## Step 2: Create the Database

### Option A: Using phpMyAdmin (Easiest)
1. Open your browser and go to: `http://localhost/phpmyadmin`
2. You should see the phpMyAdmin login page
3. Leave username as **root** and leave password **empty**, then click Login
4. Click on the **"SQL"** tab at the top
5. Copy and paste the contents of `database/xulubrands.sql`
6. Click the **Execute** button

### Option B: Using MySQL Command Line
1. Open **Command Prompt**
2. Navigate to your XAMPP mysql bin directory:
   ```
   cd "C:\xampp\mysql\bin"
   ```
3. Login to MySQL:
   ```
   mysql -u root
   ```
4. Run these commands:
   ```sql
   CREATE DATABASE IF NOT EXISTS xulubrands;
   USE xulubrands;

   CREATE TABLE IF NOT EXISTS users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(50) UNIQUE NOT NULL,
       email VARCHAR(100) UNIQUE NOT NULL,
       password VARCHAR(255) NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
       updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
   );

   CREATE INDEX idx_email ON users(email);
   CREATE INDEX idx_username ON users(username);
   ```

## Step 3: Access Your Website

1. Make sure XAMPP Apache and MySQL are running
2. Open your browser and go to: `http://localhost/xulubrands/XuluWebsite/`
3. You should see your XuluBrands website with working Login and Register buttons

## Step 4: Test the System

1. Click **Sign Up** and create a test account
2. Fill in:
   - Username: testuser
   - Email: test@example.com
   - Password: password123
   - Confirm Password: password123
3. Click **Register**
4. You should see a success message and redirect to login
5. Use the credentials to sign in

## Files Structure

```
XuluWebsite/
├── index.html              # Main website with login/register links
├── php/
│   ├── db.php             # Database connection file
│   ├── login.php          # Login page & logic
│   ├── register.php       # Registration page & logic
│   └── contact.php        # Contact form (optional)
├── database/
│   └── xulubrands.sql     # Database schema
└── images/                # Website images
```

## Important Notes

- **db.php** uses default XAMPP credentials:
  - User: `root`
  - Password: (empty)
  - Server: `localhost`
  - Database: `xulubrands`

- If you want to change these credentials, edit `php/db.php` and update:
  ```php
  define('DB_USER', 'root');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'xulubrands');
  ```

## Troubleshooting

### "Connection failed" error
- Make sure MySQL is running in XAMPP Control Panel
- Check that the database name in `db.php` matches the one you created

### "Table doesn't exist" error
- Make sure you ran the SQL script to create the users table
- Check phpMyAdmin to verify the table exists

### "Access denied for user 'root'" error
- Make sure Apache and MySQL are both running
- Check your db.php credentials match your MySQL setup

## Next Steps

After successful setup:
1. You can add more tables for:
   - Products/Services
   - Orders
   - Contact messages
   - User profiles

2. Create a dashboard page for logged-in users
3. Add more features like password reset, email verification, etc.

