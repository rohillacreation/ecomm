@extends('order::layouts.master')

@section('content')

<div class="py-3 bg-white overflow-hidden shadow-sm sm:rounded-lg">

    <div class="grid grid-cols-3 gap-4">

        <form action="{{route('cod')}}" method="POST">

            @csrf
            <input type="hidden" name="razorpay_order_id" value="{{$order_id}}">
            <button type="submit" name="COD" value="cod">Cash on delivery</button>
        </form>

        <button id="rzp-button1">Pay with Razorpay</button>

    </div>

</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="{{route('pay')}}" method="POST">
    @csrf
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
    <input type="hidden" name="razorpay_order_id"  id="razorpay_order_id" >
</form>


<script>


var options = @json($data);


options.handler = function (response){
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    document.getElementById('razorpay_order_id').value = response.razorpay_order_id;
    document.razorpayform.submit();
};


options.theme.image_padding = false;

var rzp = new Razorpay(options);

document.getElementById('rzp-button1').onclick = function(e){
    rzp.open();
    e.preventDefault();
}
</script>
    
@endsection
