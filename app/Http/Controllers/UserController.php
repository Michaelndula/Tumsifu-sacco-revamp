<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if ($user->role === 'user') {
            return Inertia::render('Dashboards/User/Dashboard');
        } else {
            // Handle unauthorized access
            return Inertia::render('Auth/ForbiddenAccess');
        }
    }
}
