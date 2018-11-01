<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class LeenController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        $cart = session('cart');
        return view('dashboard.leen', compact('cart'));
    }

    public function add(Request $request) {
        // add to cart session
        $cart = session('cart');

        $item = Item::where('name', 'like', $request->id)->first();
        if ($item && !in_array($item, $cart)) $request->session()->push('cart', $item);

        $redirect = redirect('item/leen');
        if (!$item) $redirect->withErrors(['id'=>'Can\'t find '.$request->id]);
        elseif (in_array($item, $cart)) $redirect->withErrors(['id'=>'already in cart '.$request->id]);
        // elseif ($item->isGeleend) $redirect->withErrors(['id'=>'al geleend '.$request->id]);
        return $redirect;
    }

    public function remove(Request $request) {
        // remove from cart session
    }

    public function remove_all() {
        // clears cart session
    }

    public function checkout() {
        /**
         * foreach session
         * add to item_loan
         * redirect success and clear cart
        */
    }
}
