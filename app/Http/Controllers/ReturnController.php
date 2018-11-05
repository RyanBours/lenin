<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ReturnController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
    }
    
    public function index() {
        $cart = session('cart_return');
        return view('return', compact('cart'));
    }

    public function add(Request $request) {
        $cart = session('cart_return');
        $item = Item::where('name', 'like', $request->id)->first();
        if ($item && !in_array($item, $cart ? $cart : [])) $request->session()->push('cart_return', $item);
        
        $redirect = redirect('/return');
        if (!$item) $redirect->withErrors(['id'=>'can\'t find item']);
        elseif (in_array($item, $cart ? $cart : [])) $redirect->withErrors(['id'=>$item->name.' is already in cart']);
        // elseif (!$geleend) $redirect->withErrors(['id'=>'item is niet geleend']);
        return $redirect;
    }

    public function remove(Request $request, $item) {
        $cart = session()->pull('cart_return', []);
        if(($key = array_search($item, $cart)) !== false) {
            unset($cart[$key]);
        }
        session()->put('cart_return', $cart);
        return redirect('/return');
    }

    public function clear(Request $request) {
        $request->session()->forget('cart_return');
        return redirect('/return');
    }

    public function checkout() {
        return redirect('/return');
    }
}
