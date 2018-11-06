<?php

namespace App\Http\Controllers;

use App\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $loans = loan::where('user_id', '=', Auth::id())
            ->orderBy('returned', 'asc')
            ->get();
        return view('dashboard.my', compact('loans'));
    }
}
