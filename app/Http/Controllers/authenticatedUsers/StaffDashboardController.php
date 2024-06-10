<?php

namespace App\Http\Controllers\authenticatedUsers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffDashboardController extends Controller
{
    public function dashboard(){
        return view("authenticated users/dashboard");
    }
}
