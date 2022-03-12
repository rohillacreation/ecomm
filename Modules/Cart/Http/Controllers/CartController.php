<?php

namespace Modules\Cart\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Cart\Entities\Cart;
use App\Models\Address;


class CartController extends Controller
{
    function add_cart(Request $request)
    {
        if ($request->ajax()) {

            $qty = $request->qty;
            $var_id = $request->var_id;
            $pro_id = $request->pro_id;

            if (Auth::check()) {

                //log in check

                $user = Auth::user();
                $user_id = $user->id;


                if ($var_id > 0) {

                    $find = cart::where('variant_id', $var_id)->first();

                    if ($find === null) {

                        $cart = new cart;

                        $cart->user_id = $user_id;
                        $cart->product_id = $pro_id;
                        $cart->variant_id = $var_id;
                        $cart->quantity = $qty;

                        $done = $cart->save();

                        if ($done) {
                            echo '<h3>product added into cart</h3>';
                        }
                    } else {

                        echo '<h3>Product alredy exist in cart</h3>';
                    }
                } else {
                    $find = cart::where('product_id', $pro_id)->first();

                    if ($find === null) {

                        $cart = new cart;
                        $cart->user_id = $user_id;
                        $cart->product_id = $pro_id;
                        $cart->quantity = $qty;

                        $done = $cart->save();

                        if ($done) {
                            echo '<h3>product added into cart</h3>';
                        }
                    } else {

                        echo '<h3>Product alredy exist in cart</h3>';
                    }
                }
            } else {

                echo '<h3>Please login first</h3>';
            }
        }
    }


    function index()
    {
        $user_id = Auth::user()->id;
        $cart = cart::where('user_id', $user_id)->get();
        return view('cart::index');
    }

    function checkout()
    {
        $user_id = Auth::user()->id;
        $address = Address::where('user_id', $user_id)->get();

        $cart = cart::where('user_id', $user_id)
            ->with('product', 'variant')
            ->get();

        return view('cart::shiping')
            ->with('addresses', $address)
            ->with('cart', $cart);
    }
}
