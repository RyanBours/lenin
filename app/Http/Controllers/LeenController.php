<?php

namespace App\Http\Controllers;

use App\Item;
use App\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $cart = session('cart_leen');
        return view('dashboard.leen', compact('cart'));
    }

    public function add(Request $request) {
        // add to cart session
        $item = Item::where('name', 'like', $request->id)->first();
        $cart = session('cart_leen');

        $redirect = redirect('dashboard/leen');
        if (!$item) $redirect->withErrors(['id'=> 'Kan ' . $request->id . 'niet vinden']);
        elseif ($item->isBorrowed()) $redirect->withErrors(['id'=> $request->id . 'al geleend ']);
        elseif (in_array($item, $cart ? $cart : [])) $redirect->withErrors(['id'=>$item->name.' is al toegevoegd']);
        else $request->session()->push('cart_leen', $item);

        return $redirect;
    }

    public function remove(Request $request, $item) {
        // remove from cart session
        $cart = session()->pull('cart_leen', []);
        if(($key = array_search($item, $cart)) !== false) {
            unset($cart[$key]);
        }
        session()->put('cart_leen', $cart);
        return redirect('dashboard/leen');
    }

    public function clear(Request $request) {
        // clears cart session
        $request->session()->forget('cart_leen');
        return redirect('dashboard/leen');
    }

    public function checkout(Request $request) {
        $cart = session('cart_leen');
        if (!$cart) return redirect('/dashboard/leen')->withErrors(['error'=>'Geen items toegevoegd']);
        foreach($cart as $item) {
            loan::create(['user_id'=>Auth::id(), 'item_id'=>$item->id]);
        }
        
        $request->session()->forget('cart_leen');
        return redirect('/success');
    }
}
