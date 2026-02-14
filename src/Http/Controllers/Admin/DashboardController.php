<?php

namespace ParthoKar\AdminCore\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use ParthoKar\AdminCore\Models\Admin;

use ParthoKar\AdminCore\Models\Role;

use ParthoKar\AdminCore\Models\Permission;

class DashboardController extends Controller
{
    public function index()
    {

       $data['totalUsers'] = Admin::count();

       $data['totalRoles'] = Role::count();

       $data['totalPermissions'] = Permission::count();

       return view('admin-core::admin.dashboard',$data);
    }
}
