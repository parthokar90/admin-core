<?php

namespace ParthoKar\AdminCore\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use ParthoKar\AdminCore\Models\Admin;
use ParthoKar\AdminCore\Models\Role;
use ParthoKar\AdminCore\Models\Permission;

class InstallAdminCoreCommand extends Command
{
    protected $signature = 'admin-core:install';

    protected $description = 'Install Admin Core and create default admin';

    public function handle()
    {
        $this->info('Installing Admin Core...');

        // run package migrations
        $this->call('migrate');

        // default admin from config
        $config = config('admin-core.default_admin');

        $email = $config['email'];

        $password = $config['password'];

        $admin = Admin::firstOrCreate(
            ['email' => $email],
            [
                'name' => 'Admin',
                'password' => Hash::make($password),
            ]
        );

        $this->info("Default admin created: {$email} / {$password}");

        // create super admin role
        $role = Role::firstOrCreate(['name' => 'Super Admin']);

        // create default permissions (basic)
        $permissions = [
            ['name' => 'Manage Users', 'slug' => 'manage-users'],
            ['name' => 'Manage Roles', 'slug' => 'manage-roles'],
            ['name' => 'Manage Permissions', 'slug' => 'manage-permissions'],
        ];

        foreach ($permissions as $perm) {
            $permission = Permission::firstOrCreate($perm);
            $role->permissions()->syncWithoutDetaching($permission);
        }

        // assign role to admin
        $admin->roles()->syncWithoutDetaching($role);

        $this->info('Admin Core installed successfully');
    }
}
