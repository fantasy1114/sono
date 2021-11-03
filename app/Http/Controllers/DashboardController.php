<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

#Created by Yuris

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.index');
    }
}
