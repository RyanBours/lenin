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

    public function index(Request $request) {
        $q = $request->get('q');

        $loans = loan::join('users', 'user_id', '=', 'users.id')
            ->join('items', 'item_id', '=', 'items.id')
            ->where('users.name', 'like', '%'.$q.'%')
            ->orWhere('items.name', 'like', '%'.$q.'%')            
            ->orderBy('returned', 'asc')
            ->orderBy('item_user_loans.id', 'desc')
            ->paginate(50);
        
        return view('dashboard.beheer', compact('loans', 'q'));
    }

    public function remove(Request $request, $loanId) {
        // remove loan
        $loan = Loan::where('id', 'like', $loanId)->first();
        if ($loan) $loan->updateReturned();
        return redirect('dashboard/beheer');
    }
}
