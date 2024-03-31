<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use app\Models\User;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'staff') {
            return Inertia::render('Dashboards/Staff/Dashboard');
        } else {
            // Handle unauthorized access
            return Inertia::render('Auth/ForbiddenAccess');
        }
    }
}
