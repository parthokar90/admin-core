<?php

namespace ParthoKar\AdminCore\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    public function permissions()
    {
        return $this->belongsToMany(
            Permission::class,
            'permission_role'
        );
    }

    public function admins()
    {
        return $this->belongsToMany(
            Admin::class,
            'admin_role'
        );
    }
}
