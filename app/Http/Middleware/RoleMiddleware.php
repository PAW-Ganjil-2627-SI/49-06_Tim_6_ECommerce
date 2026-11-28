<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // 1. Cek status login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // 2. Cek kesesuaian role (aman huruf besar/kecil)
        $userRole = strtolower(auth()->user()->role ?? '');
        $allowedRoles = array_map('strtolower', $roles);

        if (!in_array($userRole, $allowedRoles)) {
            abort(403, 'Anda tidak memiliki hak akses ke halaman ini.');
        }

        return $next($request);
    }
}