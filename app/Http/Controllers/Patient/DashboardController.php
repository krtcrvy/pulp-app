<?php

namespace App\Http\Controllers\Patient;

use App\Models\Appointment;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('patient.dashboard');
    }
}
