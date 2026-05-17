# XuluBrands - Home & Office Upgrade Solutions

A modern website for XuluBrands Co, a Greytown-based home and office upgrade company featuring custom cabinetry, bespoke furniture, and carpentry training courses.

## Features

- 🏠 **Services Showcase** - Display of kitchen cabinets, bedroom furniture, home upgrades, and carpentry training
- 👤 **User Authentication** - Secure registration and login system with MySQL database
- 📊 **Session Management** - PHP session-based authentication with logout functionality
- 📱 **Responsive Design** - Modern, mobile-friendly interface
- 📧 **Contact Forms** - Inquiry submission system
- 🎓 **Course Information** - Details about 5-day carpentry training program

## Tech Stack

- **Frontend**: HTML5, CSS3, JavaScript
- **Backend**: PHP 7.x+
- **Database**: MySQL
- **Server**: Apache (XAMPP)

## Project Structure

```
XuluWebsite/
├── index.php              # Main homepage with welcome overlay
├── php/
│   ├── db.php            # MySQL database connection
│   ├── login.php         # Login page with authentication
│   ├── register.php      # Registration page with validation
│   ├── logout.php        # Session logout handler
│   └── contact.php       # Contact form handler
├── database/
│   └── xulubrands.sql    # Database schema and tables
├── images/               # Website images and assets
├── .gitignore           # Git ignore rules
└── SETUP_GUIDE.md       # Detailed setup instructions
```

## Prerequisites

- XAMPP (Apache + MySQL + PHP)
- Git
- Modern web browser

## Installation

### 1. Start XAMPP Services

1. Open XAMPP Control Panel
2. Click **Start** for Apache and MySQL
3. Wait for both services to turn green

### 2. Create Database

Using phpMyAdmin:
1. Navigate to `http://localhost/phpmyadmin`
2. Go to **SQL** tab
3. Paste contents from `database/xulubrands.sql`
4. Click **Execute**

### 3. Access the Website

```
http://localhost/xulubrands/XuluWebsite/index.php
```

### 4. Test Authentication

**Register:**
- Click "Sign Up" 
- Fill in Name, Email, Password
- Click "Create Account"

**Login:**
- Click "Sign In"
- Enter email and password
- Success message appears with welcome greeting

**Logout:**
- Click "Logout" button in navigation
- Returns to welcome screen

## Database Schema

### Users Table

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

## Configuration

Database credentials in `php/db.php`:

```php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'xulubrands');
```

## Features

### Authentication Flow

1. **Welcome Screen** - Guest greeting on first visit
2. **Registration** - Validate email uniqueness and password strength
3. **Login** - Authenticate against stored passwords (hashed)
4. **Session** - Maintain user state across pages
5. **Logout** - Clear session and return to welcome screen

### Validation

- Email format validation
- Password minimum length (6 characters)
- Duplicate email detection
- Real-time error messaging
- Field clearing on success/failure

## Troubleshooting

### Connection Failed
- Ensure MySQL is running in XAMPP Control Panel
- Verify `php/db.php` database credentials

### Table Doesn't Exist
- Verify SQL script was executed successfully
- Check phpMyAdmin to confirm table creation

### Login Issues
- Clear browser cache and cookies
- Verify user exists in database
- Check password case sensitivity

## Future Enhancements

- [ ] Email verification system
- [ ] Password reset functionality
- [ ] User dashboard/profile page
- [ ] Product catalog with shopping cart
- [ ] Payment integration
- [ ] Admin panel for content management
- [ ] Email notifications
- [ ] Two-factor authentication

## License

MIT License - Feel free to use this project for your business

## Author

**Samukelo Ngubane**

For more information, visit:
- Website: http://localhost/xulubrands/XuluWebsite/
- Email: samukelo942@gmail.com

---

**Happy Building!** 🏗️ Build. Design. Upgrade.
