<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Inertia\Inertia;

class AdminController extends Controller
{
    public function index()
    {

        $user = Auth::user();

        if ($user->role === 'admin') {
            return Inertia::render('Dashboards/Admin/Dashboard');
        }else {
            // Handle unauthorized access
            return Inertia::render('Auth/ForbiddenAccess');
        }
        
    }
}