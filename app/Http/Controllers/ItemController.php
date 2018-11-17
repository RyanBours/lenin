<?php

namespace App\Http\Controllers;

use App\Item;
use App\Http\Controllers\Session;
use App\Rules\UniqueOrSameName;

use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ItemController extends Controller {

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
         * Returns item view with search query result
         * @return view
         */
        $q = $request->get('q');

        $items = Item::where('name', 'like', '%'.$q.'%')
            ->paginate(15);
        return view('dashboard.item.index', compact('items', 'q'));
    }

    public function add() {
        /**
         * GET
         * Returns Add view
         * @return view
         */
        return view('dashboard.item.add');
    }

    public function edit($id) {
        /**
         * GET
         * Returns Edit view with selected item
         * @return view
         */
        $item = Item::find($id);
        return view('dashboard.item.edit', compact('item'));
    }

    public function update($id, Request $request) {
        /**
         * POST
         * Validate the input and Updates the item and redirects to item index 
         * @return redirect
         */
        $item = Item::find($id);
        $originalName = $item->name;

        $validator = Validator::make($request->all(), [
            'name' => [ 'required', 'max:255', Rule::unique('items')->ignore($item->id) ],
            'Leenduur' =>'numeric|min:0',
        ], [
            'name.unique' => 'Naam is al in gebruik door een ander item!'
        ]);
        
        if ($validator->fails()) {
            return redirect('/dashboard/item/edit/'.$id)
                ->withErrors($validator)
                ->withInput();
        }

        $item->name = Input::get('name');
        $item->nfc_code = Input::get('NFC');
        $item->max_loan_duration = Input::get('Leenduur');
        $item->description = Input::get('description');
        $item->comment = Input::get('comment');
        $item->save();

        $request->session()->flash('status', $originalName . ' is gewijzigd!'); 
        $request->session()->flash('alert-class', 'alert-info'); 
        return redirect('/dashboard/item');
    }

    public function post(Request $request) {
        /**
         * POST
         * Validate the input and creates a new item, stores it and redirec to item index
         * @return redirect
         */
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:items|max:255',
            'Leenduur' =>'numeric|min:0',
        ], [
            'name.unique' => 'Naam is al in gebruik door een ander item!'
        ]);

        if ($validator->fails()) {
            return redirect('/dashboard/item')
                ->withErrors($validator)
                ->withInput();
        }

        $item = new Item;
        $item->name = $request->name;
        $item->nfc_code = $request->NFC;
        $item->max_loan_duration = $request->Leenduur;
        $item->description = $request->description;
        $item->comment = $request->comment;

        if ($item->save()) {
            $request->session()->flash('status', $item->name.' is toegevoegd!'); 
            $request->session()->flash('alert-class', 'alert-info'); 
            return redirect('/dashboard/item');
        }

        $request->session()->flash('status', ' Er is iets fout gegaan'); 
        $request->session()->flash('alert-class', 'alert-danger');
        return redirect('/dashboard/item');
    }
}
