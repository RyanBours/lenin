<?php

namespace App\Http\Controllers;

use App\Item;
use Validator;
use App\Http\Controllers\Session;
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:items|max:255',
        ], [
            'name.unique' => 'Name has already been used!'
        ]);

        if ($validator->fails()) {
            return redirect('/dashboard/add')
                        ->withErrors($validator)
                        ->withInput();
        }

        $item = new Item;
        $item->name = $request->name;
        $item->max_loan_duration = 0;
        $succ = $item->save();

        if ($succ) {
            $request->session()->flash('status', $item->name.' has been added!'); 
            $request->session()->flash('alert-class', 'alert-info'); 
            return redirect('/dashboard/add');
        }

        $request->session()->flash('status', ' Somenthing went wrong'); 
        $request->session()->flash('alert-class', 'alert-danger');
        return redirect('/dashboard/add');
    }
}
