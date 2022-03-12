<?php

namespace Modules\Payment\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Razorpay\Api\Api;
use Exception;
use Modules\Order\Entities\Order;
use Modules\Order\Entities\orderdetail;
use Razorpay\Api\Errors\SignatureVerificationError;
use App\Models\product;
use App\Models\Variations;

class PaymentController extends Controller
{
    function pay(Request $request)
    {
        $api = new Api('rzp_test_Im6GcXajBHdHvh', '3xJ1wk8vIRfCOx9PvYPjkbsP');

        $attributes = [

            'razorpay_order_id' => $request->input('razorpay_order_id'),

            'razorpay_payment_id' => $request->input('razorpay_payment_id'),

            'razorpay_signature' => $request->input('razorpay_signature'),

        ];


        try {

            $api->utility->verifyPaymentSignature($attributes);

            $cod = Order::where('order_id', $request->razorpay_order_id)->update([
                'method' => 'PAYONLINE',
                'razorpay_payment_id' => $request->input('razorpay_payment_id'),
                'razorpay_signature' => $request->input('razorpay_signature'),
                'status' => 'paid',
            ]);
            $order_id = Order::where('order_id', $request->razorpay_order_id)->first()->id;

            $orderdetail = orderdetail::where('order_id', $order_id);

            foreach ($orderdetail as $value) {

                if ($value->variant_id) {
                    $new_stock  = Variations::where('id', $value->variant_id)->decrement('quantity', $orderdetail->quantity);
                } else {
                    $new_stock  = Product::where('id', $value->product_id)->decrement('qty', $orderdetail->quantity);
                }
            }

            return 'order created';
        } catch (SignatureVerificationError $e) {
        }
    }

    function cod(Request $request)
    {
        if (isset($request->razorpay_order_id)) {

            $cod = Order::where('order_id', $request->razorpay_order_id)->first()->update([
                'method' => 'COD'
            ]);
            if ($cod) {

                $order_id = Order::where('order_id', $request->razorpay_order_id)->first()->id;

                $orderdetail = orderdetail::where('order_id', $order_id);

                foreach ($orderdetail as $value) {

                    if ($value->variant_id) {

                        $new_stock  = Variations::where('id', $value->variant_id)->decrement('quantity', $orderdetail->quantity);
                    } else {
                        $new_stock  = Product::where('id', $value->product_id)->decrement('qty', $orderdetail->quantity);
                    }
                }

                return 'order created successfully';
            } else {
                return 'Sorry order not created';
            }
        } else {
            return 'Sorry... something went worng and order not created';
        }
    }
}
