<?php

namespace App\Http\Controllers;
use App\Models\Loan;

use Illuminate\Http\Request;

class LoanController extends Controller
{
    //
    // routes/web.php

// app/Http/Controllers/LoanController.php



public function index()
{
    $user = auth()->user();
    $loans = $user->loans;

    return view('indexPrestamosUsuarios', compact('loans'));
}

}
