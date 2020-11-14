<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;

class DashboardController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }
}
