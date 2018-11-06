<?php

namespace App\Http\Controllers;

use App\Loan;
use Illuminate\Http\Request;

class BeheerController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $loans = loan::orderBy('returned', 'asc')->get();
        return view('dashboard.beheer', compact('loans'));
    }
}
