<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    //
   
    public function show()
    {
        $user = auth()->user();
    
        if ($user->hasRole('administrador')) {
            // Lógica para usuarios administradores
            return Inertia::render('AdminDashboard');
        } else {
            // Lógica para usuarios regulares
            return Inertia::render('UserDashboard');
        }
    }

}
