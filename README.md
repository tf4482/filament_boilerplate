# Laravel Filament Boilerplate

A modern Laravel application boilerplate with Filament admin panel, designed to kickstart your web application development with a powerful and elegant administration interface.

## 🚀 Features

- **Laravel 12.0** - Latest Laravel framework with modern features
- **Filament 4.0** - Beautiful, modern admin panel with rich components
- **User Management** - Complete CRUD operations for user administration
- **Role-based Authentication** - Admin, moderator, editor, and user roles
- **Status Management** - Active, inactive, and suspended user states
- **Advanced Filtering** - Filter users by role and status
- **Search & Sort** - Searchable and sortable user tables
- **Responsive Design** - Mobile-friendly admin interface
- **SQLite Database** - Lightweight database setup for quick development
- **Modern UI Components** - Rich form fields, tables, and actions

## 📋 Requirements

- PHP 8.2 or higher
- Composer
- Node.js & NPM
- SQLite (default) or MySQL/PostgreSQL

## 🛠️ Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd filament_boilerplate
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   ```bash
   # Create SQLite database file
   touch database/database.sqlite
   
   # Run migrations
   php artisan migrate
   ```

6. **Create admin user**
   ```bash
   php artisan make:filament-user
   ```

7. **Build assets**
   ```bash
   npm run build
   ```

## 🚀 Usage

### Development Server

Start the development environment with all services:

```bash
composer run dev
```

This will start:
- Laravel development server (http://localhost:8000)
- Queue worker
- Log viewer (Pail)
- Vite development server

Or start services individually:

```bash
# Start Laravel server
php artisan serve

# Start Vite for asset compilation
npm run dev

# Start queue worker
php artisan queue:work

# Start log viewer
php artisan pail
```

### Admin Panel

Access the admin panel at: `http://localhost:8000/admin`

Use the credentials created during the `make:filament-user` step.

### User Management

The admin panel includes a comprehensive user management system with:

- **User Listing** - View all users with pagination and filtering
- **User Creation** - Add new users with role assignment
- **User Editing** - Modify user information and roles
- **User Viewing** - Read-only user details
- **Bulk Actions** - Delete multiple users at once
- **Advanced Filtering** - Filter by role (admin, moderator, editor, user) and status (active, inactive, suspended)
- **Search** - Search by name, email, phone, and country
- **Avatar Support** - User profile pictures with default fallback

## 📁 Project Structure

```
app/
├── Filament/
│   └── Resources/
│       └── Users/
│           ├── UserResource.php       # Main resource configuration
│           ├── Pages/                 # CRUD pages
│           │   ├── CreateUser.php
│           │   ├── EditUser.php
│           │   └── ListUsers.php
│           ├── Schemas/
│           │   └── UserForm.php       # Form field definitions
│           └── Tables/
│               └── UsersTable.php     # Table configuration
├── Models/
│   └── User.php                       # User model
└── ...
```

## 🔧 Configuration

### Database

The application uses SQLite by default. To use MySQL or PostgreSQL:

1. Update your `.env` file:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

2. Run migrations:
   ```bash
   php artisan migrate
   ```

### Filament

Filament configuration is located in `config/filament.php`. The admin panel is accessible at `/admin` by default.

## 🧪 Testing

Run the test suite:

```bash
composer run test
```

Or run PHPUnit directly:

```bash
php artisan test
```

## 🎨 Customization

### Adding New Resources

1. Create a new Filament resource:
   ```bash
   php artisan make:filament-resource YourModel --generate
   ```

2. Organize your resource files following the established pattern:
   ```
   app/Filament/Resources/YourModel/
   ├── YourModelResource.php
   ├── Pages/
   ├── Schemas/
   └── Tables/
   ```

### Extending User Management

The user management system can be extended by:

- Adding new fields to `UserForm.php`
- Modifying table columns in `UsersTable.php`
- Adding custom actions and filters
- Creating custom pages

## 📚 Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Filament Documentation](https://filamentphp.com/docs)
- [Laravel Filament Best Practices](https://filamentphp.com/docs/panels/installation)

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 🐛 Issues & Bug Reports

If you encounter any issues or bugs, please report them on the [GitHub Issues](../../issues) page.

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🙏 Acknowledgments

- [Laravel](https://laravel.com) - The PHP framework for web artisans
- [Filament](https://filamentphp.com) - Beautiful TALL stack admin panel
- [Tailwind CSS](https://tailwindcss.com) - Utility-first CSS framework
- [Alpine.js](https://alpinejs.dev) - Lightweight JavaScript framework

---

**Happy coding! 🎉**