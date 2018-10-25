<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function dashboard() {
        return view('dashboard.dashboard');
    }
    
    public function add() {
        return view('dashboard.add');
    }
    
    public function beheer() {
        return view('dashboard.beheer');
    }

    public function leen() {
        return view('dashboard.leen');
    }

    public function my() {
        return view('dashboard.my');
    }
}
