<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {

        return view('dashboard.index', [
            'total_companies' => Company::count(),
            'total_employees' => Employee::count()
        ]);
    }
}
