<?php

namespace Modules\Order\Http\Controllers;

use Modules\Order\Entities\Order;
use Modules\Cart\Entities\Cart;
use Modules\Order\Entities\Orderdetail;
use App\Models\Address;
use App\Models\Product;
use App\Models\Variations;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //order check or creation 
    function create(Request $request)
    {


        if (isset($request->address)) {
            $address = Address::where('user_id', Auth::user()->id)->find($request->address);

            if ($address) {
                if ($request->ver_id > 0) {
                    $var_price = Variations::find($request->ver_id)->price;
                    $var_quantity = Variations::find($request->ver_id)->quantity;
                    if ($var_quantity > $request->qty) {
                   
                        $api = new Api('rzp_test_Im6GcXajBHdHvh', '3xJ1wk8vIRfCOx9PvYPjkbsP');
                        $api_order = $api->order->create([

                            'receipt'   => now()->timestamp,
                            'amount'    => $var_price * $request->qty * 100,
                            'currency'  => 'INR'
                        ]);

                       
                        $order = new Order;

                        $order->order_id   = $api_order->id;
                        $order->user_id    = Auth::user()->id;
                        $order->amount     = $var_price * $request->qty;
                        $order->address_id = $request->address;
                        $order->status     = 'created';

                        $order->save();

                        $order_id = $order->id;

                        $order_detail = new Orderdetail;

                        $order_detail->order_id = $order_id;
                        $order_detail->product_id = $request->pro_id;
                        $order_detail->variant_id = $request->ver_id;
                        $order_detail->quantity = $request->qty;

                        $order_detail_done = $order_detail->save();

                        if ($order_detail_done) {

                            $address_details = Address::find($request->address);

                            $data = [

                                "key"               => 'rzp_test_Im6GcXajBHdHvh',
                                "amount"            => $var_price * $request->qty * 100,
                                "name"              => "Ecom",
                                "description"       => "Buy best price",
                                "image"             => "https://cdn.razorpay.com/logos/FFATTsJeURNMxx_medium.png",
                                "prefill"           => [
                                    "name"              => $address_details->name . $address_details->lname,
                                    "email"             => $address_details->email,
                                    "contact"           => $address_details->phone,
                                ],

                                "theme"             => [
                                    "color"             => "#99cc33"
                                ],
                                "order_id"          => $api_order->id,
                            ];


                            return view('order::index')
                                ->with('data', $data)
                                ->with('order_id', $api_order->id);
                        }
                    } else {
                        return redirect()->back()->with('wrong', 'Sorry range is out of stock');
                    }
                } else {
                    $price = Product::find($request->pro_id)->price;

                    $quantity = Product::find($request->pro_id)->quantity;

                    $address = Product::find($request->pro_id)->quantity;

                    if ($quantity > $request->qty) {
                      
                        $api = new Api('rzp_test_Im6GcXajBHdHvh', '3xJ1wk8vIRfCOx9PvYPjkbsP');
                        $api_order = $api->order->create([

                            'receipt'   => now()->timestamp,
                            'amount'    => $price * $request->qty * 100,
                            'currency'  => 'INR'
                        ]);
               
                        $order = new Order;

                        $order->order_id   = $api_order->id;
                        $order->user_id    = Auth::user()->id;
                        $order->amount     = $price * $request->qty;
                        $order->address_id = $request->address;
                        $order->status     = 'created';

                        $order->save();

                        $order_id = $order->id;

                        $order_detail = new Orderdetail;

                        $order_detail->order_id = $order_id;
                        $order_detail->product_id = $request->pro_id;
                        $order_detail->quantity = $request->qty;

                        $order_detail_done = $order_detail->save();

                        if ($order_detail_done) {

                            $address_details = Address::find($request->address);

                            $data = [

                                "key"               => 'rzp_test_Im6GcXajBHdHvh',
                                "amount"            => $price * $request->qty * 100,
                                "name"              => "Ecom",
                                "description"       => "Buy best price",
                                "image"             => "https://cdn.razorpay.com/logos/FFATTsJeURNMxx_medium.png",
                                "prefill"           => [
                                    "name"              => $address_details->name . $address_details->lname,
                                    "email"             => $address_details->email,
                                    "contact"           => $address_details->phone,
                                ],

                                "theme"             => [
                                    "color"             => "#99cc33"
                                ],
                                "order_id"          => $api_order->id,
                            ];


                            return view('order::index')
                                ->with('data', $data)
                                ->with('order_id', $api_order->id);
                        }
                    } else {
                        return redirect()->back()->with('wrong', 'Sorry range is out of stock');
                    }
                }
            } else {
                return redirect()->back()->with('wrong', 'Sorry address not found');
            }
        } else {

            return redirect()->back()->with('wrong', 'Sorry something went worng with address');
        }
    }

    function cart_order(Request $request)
    {
        if (isset($request->address)) {
            $address = Address::where('user_id', Auth::user()->id)->find($request->address);

            if ($address) {
                $cart = Cart::with('product','variant')
                    ->where('user_id', Auth::user()->id)
                    ->get();

                $total_price = 0; 

                if (count($cart) > 0) {

                    foreach ($cart as $item) {

                        if ($item->variant_id) {
                            if ($item->quantity < $item->variant->quantity) 
                            {
                                $total_price = $total_price + $item->variant->price * $item->quantity;
                            } 
                        } 
                        else 
                        {
                            if ($item->quantity < $item->product->qty) 
                            {
                                $total_price = $total_price + $item->product->unit_price * $item->quantity;
                            }
                        }
                    }

                    $api = new Api('rzp_test_Im6GcXajBHdHvh', '3xJ1wk8vIRfCOx9PvYPjkbsP');

                        $api_order = $api->order->create([

                            'receipt'   => now()->timestamp,
                            'amount'    => $total_price*100,
                            'currency'  => 'INR'
                        ]);



                        $order = new Order;

                        $order->order_id   = $api_order->id;
                        $order->user_id    = Auth::user()->id;
                        $order->amount     = $total_price;
                        $order->address_id = $request->address;
                        $order->status     = 'created';

                        $order->save();

                        $order_id = $order->id;

                        foreach ($cart as $item) {

                            if ($item->variant_id) {

                                if ($item->quantity < $item->variant->quantity) 
                                {
                                    $order_detail = new Orderdetail;

                                        $order_detail->order_id = $order_id;
                                        $order_detail->product_id = $item->product_id;
                                        $order_detail->variant_id = $item->variant_id;
                                        $order_detail->quantity = $item->quantity;

                                    $order_detail->save();
                                } 
                            } 
                            else 
                            {
                                if ($item->quantity < $item->product->qty) 
                                {
                                    $order_detail = new Orderdetail;

                                    $order_detail->order_id = $order_id;
                                    $order_detail->product_id = $item->product_id;
                                    $order_detail->quantity = $item->quantity;

                                    $order_detail->save();
                                }
                            }
                        }

                        $address_details = Address::find($request->address);

                            $data = [

                                "key"               => 'rzp_test_Im6GcXajBHdHvh',
                                "amount"            => $total_price*100,
                                "name"              => "Ecom",
                                "description"       => "Buy best price",
                                "image"             => "https://cdn.razorpay.com/logos/FFATTsJeURNMxx_medium.png",
                                "prefill"           => [
                                    "name"              => $address_details->name . $address_details->lname,
                                    "email"             => $address_details->email,
                                    "contact"           => $address_details->phone,
                                ],

                                "theme"             => [
                                    "color"             => "#99cc33"
                                ],
                                "order_id"          => $api_order->id,
                            ];


                            return view('order::index')
                                ->with('data', $data)
                                ->with('order_id', $api_order->id);
                   
                    
                } else {
                    return redirect('/cart');
                }
            } else {
                return redirect()->back()->with('wrong', 'Sorry address not found');
            }
        } else {

            return redirect()->back()->with('wrong', 'Sorry something went worng with address');
        }
    }
}
