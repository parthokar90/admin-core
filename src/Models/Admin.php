<?php

namespace ParthoKar\AdminCore\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    // Admin ↔ Role relationship
    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            'admin_role'
        );
    }

    // Check if admin has permission
    public function hasPermission(string $permission): bool
    {
        return $this->roles()
            ->whereHas('permissions', function ($query) use ($permission) {
            $query->where('slug', $permission);
        })
        ->exists();
    }

}
