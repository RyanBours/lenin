<?php

namespace App\Http\Controllers;

use App\Item;
use App\Loan;
use Carbon\Carbon;
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
        /**
         * GET
         * Returns leen view with cart_leen from session
         * @return view
         */
        $cart = session('cart_leen');
        return view('dashboard.leen', compact('cart'));
    }

    public function add(Request $request) {
        /**
         * POST
         * Find item and add to cart_leen array in session
         * redirect (with errors) to dashboard and flash on success 
         * @return redirect
         */
        $item = Item::where('name', 'like', $request->id)->first();
        $cart = session('cart_leen');

        $redirect = redirect('dashboard/leen');
        if (!$item) $redirect->withErrors(['id'=> 'Kan ' . $request->id . 'niet vinden']);
        elseif ($item->isBorrowed()) $redirect->withErrors(['id'=> $request->id . 'al geleend ']);
        elseif (in_array($item, $cart ? $cart : [])) $redirect->withErrors(['id'=>$item->name.' is al toegevoegd']);
        else {
            $request->session()->flash('status', $item->name.' is toegevoegd!');
            $request->session()->flash('alert-class', 'alert-info');
            $request->session()->push('cart_leen', $item);
        }

        return $redirect;
    }

    public function remove(Request $request, $item) {
        /**
         * POST
         * Find $item in cart_leen session, removes from cart_leen array and returns to leen page
         * @return redirect
         */
        $cart = session()->pull('cart_leen', []);
        if(($key = array_search($item, $cart)) !== false) {
            unset($cart[$key]);
        }
        session()->put('cart_leen', $cart);
        return redirect('dashboard/leen');
    }

    public function clear(Request $request) {
        /**
         * POST
         * Clears cart_leen and redirects to leen page
         * @return redirect
         */
        $request->session()->forget('cart_leen');
        return redirect('dashboard/leen');
    }

    public function checkout(Request $request) {
        /**
         * POST
         * Creates loans foreach item in the cart_leen session
         * redirect with flash when empty
         * and clear the cart_leen value in session before redirecting to success page
         * @return redirect
         */
        $cart = session('cart_leen');
        if (!$cart) {
            $request->session()->flash('status', 'cart is leeg');
            $request->session()->flash('alert-class', 'alert-warning');
            return redirect('/dashboard/leen');
        }
        foreach($cart as $item) {
            loan::create([
                'user_id'=>Auth::id(),
                'item_id'=>$item->id,
                'expected_end_date' => Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now())->addDays($item->max_loan_duration)
            ]);
        }
        
        $request->session()->forget('cart_leen');
        return redirect('/success');
    }
}
