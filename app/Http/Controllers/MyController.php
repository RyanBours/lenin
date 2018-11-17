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

    public function index(Request $request) {
        /**
         * GET
         * Returns My view with loans from the user
         * @return view
         */
        $q = $request->get('q');

        $loans = loan::where('user_id', '=', Auth::id())
            ->join('items', 'item_id', '=', 'items.id')
            ->where('items.name', 'like', '%'.$q.'%')
            ->orderBy('returned', 'asc')
            ->orderBy('item_user_loans.id', 'desc')
            ->paginate(20);
        return view('dashboard.my', compact('loans', 'q'));
    }
}
