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
    public function __construct() {}
    
    public function index() {
        /**
         * GET
         * Returns return view with cart_return from session
         * @return view
         */
        $cart = session('cart_return');
        return view('return', compact('cart'));
    }

    public function add(Request $request) {
        /**
         * POST
         * Find item and add to cart_return array in session
         * redirect (with errors) to dashboard and flash on success 
         * @return redirect
         */
        $item = Item::where('name', 'like', $request->id)->first();
        $cart = session('cart_return');

        $redirect = redirect('/return');
        if (!$item) $redirect->withErrors(['id'=> 'Kan ' . $request->id . 'niet vinden' ]);
        elseif (!$item->isBorrowed()) $redirect->withErrors(['id'=> $request->id . 'is niet geleend ']);
        elseif (in_array($item, $cart ? $cart : [])) $redirect->withErrors(['id'=>$item->name.' is al toegevoegd']);
        else {
            $request->session()->flash('status', $item->name.' is toegevoegd!');
            $request->session()->flash('alert-class', 'alert-info');
            $request->session()->push('cart_return', $item);
        }

        return $redirect;
    }

    public function remove(Request $request, $item) {
        /**
         * POST
         * Find $item in cart_return session, removes from cart_return array and returns to return page
         * @return redirect
         */
        $cart = session()->pull('cart_return', []);
        if(($key = array_search($item, $cart)) !== false) {
            unset($cart[$key]);
        }
        session()->put('cart_return', $cart);
        return redirect('/return');
    }

    public function clear(Request $request) {
        /**
         * POST
         * Clears cart_return and redirects to return page
         * @return redirect
         */
        $request->session()->forget('cart_return');
        return redirect('/return');
    }

    public function checkout(Request $request) {
        /**
         * POST
         * updates loans as marked foreach item in the cart_return session
         * redirect with flash when empty
         * and clear the cart_return value in session before redirecting to success page
         * @return redirect
         */
        $cart = session('cart_return');

        if (!$cart) {
            $request->session()->flash('status', 'cart is leeg');
            $request->session()->flash('alert-class', 'alert-warning');
            return redirect('/return');
        }

        foreach($cart as $item) {
            $item->loans->where('returned', '=', 0)
                ->first()
                ->updateReturned();
        }

        $request->session()->forget('cart_return');
        return redirect('/success');
    }
}
