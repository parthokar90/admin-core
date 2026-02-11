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

## Verify package loaded
```bash
php artisan serve
```
## Visit Url
```bash
http://localhost:8000/admin/login
http://localhost:8000/admin/dashboard
```
