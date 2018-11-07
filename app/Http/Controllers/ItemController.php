<?php

namespace App\Http\Controllers;

use App\Item;
use App\Http\Controllers\Session;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class ItemController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $items = Item::paginate(15);
        return view('dashboard.item.add', compact('items'));
    }

    public function edit($id) {
        $item = Item::find($id);
        return view('dashboard.item.edit', compact('item'));
    }

    public function update($id, Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:items|max:255',
        ], [
            'name.unique' => 'Name has already been used!'
        ]);
        
        if ($validator->fails()) {
            return redirect('/dashboard/item/edit/'.$id)
                ->withErrors($validator)
                ->withInput();
        }

        $item = Item::find($id);
        $item->name = Input::get('name');
        $item->nfc_code = Input::get('NFC');
        $item->max_loan_duration = Input::get('Leenduur');
        $item->save();

        $request->session()->flash('status', ' has been updated!'); 
        $request->session()->flash('alert-class', 'alert-info'); 
        return redirect('/dashboard/item');
    }

    public function post(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:items|max:255',
        ], [
            'name.unique' => 'Name has already been used!'
        ]);

        if ($validator->fails()) {
            return redirect('/dashboard/item')
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
            return redirect('/dashboard/item');
        }

        $request->session()->flash('status', ' Somenthing went wrong'); 
        $request->session()->flash('alert-class', 'alert-danger');
        return redirect('/dashboard/item');
    }
}
