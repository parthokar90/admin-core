<?php

namespace ParthoKar\AdminCore\Http\Middleware;

use Closure;

use Illuminate\Http\Request;

class PermissionMiddleware
{
    public function handle(Request $request, Closure $next, $permission)
    {
        $admin = auth('admin')->user();

        if (!$admin || !$admin->hasPermission($permission)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
