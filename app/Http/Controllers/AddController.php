<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('dashboard.add');
    }

    public function post(Request $request) {
        $item = new Item;
        $item->name = $request->name;
        $item->save();

        return redirect('item/add');
    }
}
