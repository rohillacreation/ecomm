<?php

namespace Modules\BuyNow\Http\Controllers;

use App\Models\Address;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Product;
use App\Models\Variations;
use Illuminate\Support\Facades\Auth;

use Razorpay\Api\Api;
use Session;
use Exception;
use Illuminate\Contracts\Session\Session as SessionSession;

class BuyNowController extends Controller
{
    function address_selection(Request $request)
    {

        $pro_id = $request->product_id;
        $qty = $request->qty;
        if($request->variant_id == ''){
            $var_id = $request->variant_id = 0;
        }
        else
        $var_id = $request->variant_id;
    
        if (fmod($qty, 1) == 0.00 && $qty > 0) {

            if (Auth::check()) {

                $user = Auth::user();
                $user_id = $user->id;
              
                if ($var_id == 0) {
        

                    $pro_stock = Product::find($pro_id)->quantity;
                    if ($pro_stock > $qty) {

                        $product = Product::find($pro_id);
                        $address = Address::where('user_id', $user_id)->get();
                        $price = $product->unit_price;
                        $qty = $request->qty;
                        
                        $variant = [];

                         return view('buynow::address')
                             ->with('product', $product)
                             ->with('price', $price)
                             ->with('addresses', $address)
                             ->with('qty', $qty)
                             ->with('variant', $variant);

                    } else {

                        return redirect()->back();
                    }
                } else {
                   
                    $var_stock = Variations::where('product_id',$pro_id)->find($var_id);

                    if ($var_stock > $qty) {

                        $product = Product::find($pro_id);
                        $variant = Variations::find($var_id);
                        $address = Address::where('user_id', $user_id)->get();
                        $price = $variant->price;
                        $qty = $request->qty;

                        return view('buynow::address')
                            ->with('product', $product)
                            ->with('variant', $variant)
                            ->with('price', $price)
                            ->with('addresses', $address)
                            ->with('qty', $qty);
                    } else {

                        return redirect()->back();
                    }
                }
            } else {

                return redirect()->back()->with('wrong', 'Please login first');
            }
        } else {

            return redirect()->back()->with('wrong', 'Sorry something went worng');
        }
    }

    function add_address(Request $request)
    {

        $data = new Address;

        $data->name = $request->name;
        $data->lname = $request->lname;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->pincode = $request->pincode;
        $data->state = $request->state;
        $data->country = $request->country;
        $data->user_id = Auth::user()->id;

        $done = $data->save();

        if ($done) {
            $output = 'Address saved succesfully';
        } else {
            $output = 'Sorry Address not saved';
        }

        echo $output;
    }

    function address_change(Request $request)
    {
        if ($request->ajax()) {

            $add_id = $request->add;
            $pro_id = $request->pro_id;

            $user = Auth::user();
            $user_id = $user->id;
            $user_email = $user->email;
            $user_name = $user->name;

            $output = '';


            if ($add_id == 0) {

                $output .= '<div class="col-span-2">

                            <input id="fname" name="fname" type="text" placeholder="First Name" value="' . $user_name . '" class="border-gray-600 p-2 m-1 text-sm rounded">
                            <input id="lname" name="lname" type="text" placeholder="Last Name" value="" class="border-gray-600 p-2 m-1 text-sm rounded">
                            <input id="email" name="email" type="email" placeholder="abcd@xyz.com" value="' . $user_email . '" class="border-gray-600 p-2 m-1 text-sm rounded">
                            <input id="phone" name="phone" type="tel" placeholder="Phone no" value="" class="border-gray-600 p-2 m-1 text-sm rounded">
                            
                            </div>
                            
                            <div class="col-span-2">

                            <input id="address" name="address" type="text" placeholder="House no Street no" value="" class="border-gray-600 p-2 m-1 text-sm rounded">
                            <input id="pincode" name="pincode" type="number" placeholder="Pincode eg. 110006" value="" class="border-gray-600 p-2 m-1 text-sm rounded">
                            <input id="state" name="state" type="text" placeholder="State" value="" class="border-gray-600 p-2 m-1 text-sm rounded">
                            <select id="country" placeholder="country" value="" class="border-gray-600 m-1 text-sm rounded">
                                        
                                        <option value="" selected>Select Country</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="China">China</option>
                                        <option value="India">India</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Maldives">Maldives</option>

                            </select>

                            </div>

                            <div class="col-span-4">
                                <button id="add_address" class="text-sm bg-blue-500 w-full py-1 my-2 border border-blue-900 rounded-sm">Add Address</button>
                            </div>';
            } else {
                $add = Address::where('user_id', $user_id)->find($add_id);

                if ($add) {

                    $output .= '<div class="col-span-2">
        
                    <input disabled value="' . $add->name . '" class="border-gray-600 p-2 m-1 text-sm rounded">
                    <input disabled value="' . $add->lname . '" class="border-gray-600 p-2 m-1 text-sm rounded">
                    <input disabled value="' . $add->email . '" class="border-gray-600 p-2 m-1 text-sm rounded">
                    <input disabled value="' . $add->phone . '" class="border-gray-600 p-2 m-1 text-sm rounded">

                </div>


                <div class="col-span-2">

                    <input disabled value="' . $add->address . '" class="border-gray-600 p-2 m-1 text-sm rounded">
                    <input disabled value="' . $add->pincode . '" class="border-gray-600 p-2 m-1 text-sm rounded">
                    <input disabled value="' . $add->state . '" class="border-gray-600 p-2 m-1 text-sm rounded">
                    <input disabled value="' . $add->country . '" class="border-gray-600 p-2 m-1 text-sm rounded">


                </div>';
                } else {
                    $output .= 'Sorry adderss not found';
                }
            }

            echo $output;
        }
    }
}
