# Admin Core

**Admin Core** is a Laravel package that provides a ready-to-use admin dashboard with authentication, role and permission management, and user management foundation.  
Installable via Composer, it allows developers to quickly integrate a powerful admin panel into any Laravel 12+ project.

---

##  Features (v1.0)
- Laravel 12 compatible
- Admin authentication (login page + dashboard)
- Package auto-discovery with Service Provider
- Config publish (`config/admin-core.php`)
- Routes, Views, and Migrations included
- Prepares foundation for Role & Permission management

---

## Installation

### 1. Require the package via Composer (local or GitHub)
```bash
composer require parthokar/admin-core:@dev
```

## Publish config (optional)

```bash
php artisan vendor:publish --tag=admin-core-config
```

---

### Configuration
1. Auth Guard

Open config/auth.php in your Laravel project and add:

```bash
'guards' => [
    'admin' => [
        'driver' => 'session',
        'provider' => 'admins',
    ],
],

'providers' => [
    'admins' => [
        'driver' => 'eloquent',
        'model' => ParthoKar\AdminCore\Models\Admin::class,
    ],
],
```

---

### Artisan Commands

Install Admin-Core and create default admin:

Creates default admin user

Creates default roles & permissions

Runs package migrations

```bash
php artisan admin-core:install
```

---

Routes

/admin/login → Admin login page

/admin/dashboard → Admin dashboard (protected by auth:admin)

/admin/logout → Logout

## Verify package loaded
```bash
php artisan serve
```
## Visit Url
```bash
http://localhost:8000/admin/login
http://localhost:8000/admin/dashboard
```

---
Default admin credentials
email: admin@example.com
password: password123
