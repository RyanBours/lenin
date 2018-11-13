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
        $loans = loan::orderBy('returned', 'asc')->orderBy('id', 'asc')->paginate(50);
        
        return view('dashboard.beheer', compact('loans'));
    }

    public function remove(Request $request, $loanId) {
        // remove loan
        $loan = Loan::where('id', 'like', $loanId)->first();
        if ($loan) $loan->updateReturned();
        return redirect('dashboard/beheer');
    }
}
