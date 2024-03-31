<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use app\Models\User;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboards/Staff/Dashboard');
    }
}
