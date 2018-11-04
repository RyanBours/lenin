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
        if ($item && !in_array($item, $cart ? $cart : [])) $request->session()->push('cart', $item);

        $redirect = redirect('item/leen');
        if (!$item) $redirect->withErrors(['id'=>'Can\'t find '.$request->id]);
        elseif (in_array($item, $cart ? $cart : [])) $redirect->withErrors(['id'=>$item->name.' is already in cart']);
        // elseif ($item->isGeleend) $redirect->withErrors(['id'=>'al geleend '.$request->id]);
        return $redirect;
    }

    public function remove(Request $request, $item) {
        // remove from cart session
        $cart = session()->pull('cart', []);
        if(($key = array_search($item, $cart)) !== false) {
            unset($cart[$key]);
        }
        session()->put('cart', $cart);
        return redirect('item/leen');
    }

    public function remove_all() {
        // clears cart session
        session()->pull('cart', []);
        return redirect('item/leen');
    }

    public function checkout() {
        /**
         * foreach session
         * add to item_loan
         * redirect success and clear cart
         * App\loan::create(['user_id'=>1, 'item_id'=>1])
        */
    }
}
