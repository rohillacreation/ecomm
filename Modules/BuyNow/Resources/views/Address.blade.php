@extends('buynow::layouts.master')

@section('content')

<div class="py-3">

    <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <p id="address_error" style="display: none;" class="w-full bg-red-100 border border-red-500 text-red-900 px-5"></p>

            @if(session('wrong'))

            <div class="bg-red-100 border border-red-400 text-red-700 px-4 m-3 py-3 rounded relative" role="alert">
        
                <span class="block sm:inline">{{session('wrong')}}</span>
        
            </div>
        
            @endif

            <div class="p-3 bg-white border-b border-gray-200">

                <div class="grid grid-cols-3 gap-4">

                    <div class="col-span-2">
        
                        <h1>Shiping & Biling Details:</h1>
                        

                        @if(count($addresses) > 0)

                           
                            <div class="flex m-1 justify-between items-center header">

                                <p class="text-sm">Choose an address:</p>

                                <select id="choose_add" name="address_exist" value="{{$addresses['0']->id}}" class="border-gray-600 text-sm rounded">
                                    
                                        @foreach ($addresses as $item)
                                    
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                    
                                        @endforeach
                                    
                                    <option value="0">New address</option>
                
                                </select>
     
                            </div>

                            <div id="change_address" class="grid grid-cols-4 gap-4">


                                <div class="col-span-2">
        
                                    <input disabled value="{{$addresses['0']->name}}" class="border-gray-600 p-2 m-1 text-sm rounded">
                                    <input disabled value="{{$addresses['0']->lname}}" class="border-gray-600 p-2 m-1 text-sm rounded">
                                    <input disabled value="{{$addresses['0']->email}}" class="border-gray-600 p-2 m-1 text-sm rounded">
                                    <input disabled value="{{$addresses['0']->phone}}" class="border-gray-600 p-2 m-1 text-sm rounded">

                                </div>
        

                                <div class="col-span-2">

                                    <input disabled value="{{$addresses['0']->address}}" class="border-gray-600 p-2 m-1 text-sm rounded">
                                    <input disabled value="{{$addresses['0']->pincode}}" class="border-gray-600 p-2 m-1 text-sm rounded">
                                    <input disabled value="{{$addresses['0']->state}}" class="border-gray-600 p-2 m-1 text-sm rounded">
                                    <input disabled value="{{$addresses['0']->country}}" class="border-gray-600 p-2 m-1 text-sm rounded">


                                </div>
                                  
                            </div>
                            

                        @else

                            <div class="flex m-1 justify-between items-center header">

                                <p class="text-sm">Choose an address:</p>

                                <select name="address_exist" id="choose_add" value="" class="border-gray-600 text-sm rounded">
            
                                     <option value="0">New Address</option>

                                </select>

                            </div>

                            <div class="grid grid-cols-4 gap-4">
        
                                <div class="col-span-2 text-center">
        
                                    <input id="fname" name="first_name" type="text" placeholder="First Name" value="{{Auth::user()->name}}" class="border-gray-600 p-2 m-1 text-sm rounded">
                                    <input id="lname" name="last_name" type="text" placeholder="Last Name" value="" class="border-gray-600 p-2 m-1 text-sm rounded">
                                    <input id="email" name="email" type="email" placeholder="abcd@xyz.com" value="{{Auth::user()->email}}" class="border-gray-600 p-2 m-1 text-sm rounded">
                                    <input id="phone" name="phone_no" type="tel" placeholder="Phone no" value="" class="border-gray-600 p-2 m-1 text-sm rounded">

                                </div>
        

                                <div class="col-span-2 text-center">
    
                                        <input id="address" name="address" type="text" placeholder="House no Street no" value="" class="border-gray-600 p-2 m-1 text-sm rounded">
                                        <input id="pincode" name="pincode" type="number" placeholder="Pincode eg. 110006" value="" class="border-gray-600 p-2 m-1 text-sm rounded">
                                        <input id="state" name="state" type="text" placeholder="State" value="" class="border-gray-600 p-2 m-1 text-sm rounded">
                                    
                                        <select id="country" name="country" placeholder="country" value="" class="border-gray-600 m-1 text-sm rounded">

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
                                    
                                </div>
                            </div>

                            
                        @endif

                    </div>

                
                    <div class="col-span-1 text-center">

                        <h1>Product Details:</h1>

                        <table class="border-b pt-2 w-full border-t border-gray-500">
                            <thead class="bg-gray-200 p-2 border-b border-gray-500">
                              <tr>
                                <th>
                                  Name
                                </th>
                                <th>
                                  Quantity
                                </th>
                                <th>
                                  Price
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>

                                <td class="px-2 py-2 whitespace-nowrap">
                                  <div class="text-center">
                                    <h1>{{$product->name}}</h1>
                                  </div>
                                </td>

                                <td class="px-2 py-2 whitespace-nowrap">
                                  <div class="text-center">
                                    <h1>{{$qty}}</h1>
                                  </div>
                                </td>
                                
                                <td class="px-2 py-2 whitespace-nowrap">
                                  <div class="text-center">
                                    <h1>{{$product->unit_price}}</h1>
                                  </div>
                                </td>
                              
                            </tbody>
                          </table>

                        <h2 class="py-2">Total Price:  ₹.  {{$product->unit_price*$qty}}</h2>

                        @if(count($addresses) > 0)
                            <form action="{{route('order')}}" method="POST" class="col-span-4">

                                @csrf

                                <input id="pro_id" name="pro_id" type="hidden" value="{{$product->id}}">

                                @if ($variant)

                                    <input id="ver_id" name="ver_id" type="hidden" value="{{$variant->id}}">
                                    
                                @else
                                
                                    <input id="ver_id" name="ver_id" type="hidden" value="0">

                                @endif
                                <input id="qty" name="qty" type="hidden" value="{{$qty}}">
                                <input id="selected_address" name="address" type="hidden" value="{{$addresses['0']->id}}">

                                <button class="text-sm bg-blue-500 w-full py-1 my-2 border border-blue-900 rounded-sm">Proceed</button>

                            </form>

                        @endif
        
                    </div>

                    

                </div>
            </div>

        </div>
    
    </div>

</div>


<script>

$(document).ready(function() {

    $('#choose_add').change(function () {

    var add = $(this).val()

    $('#selected_address').val(add)
    

        $.ajax({

            url: '{{route('address_change')}}',

            type: 'post',

            data: {

                " _token": '{{csrf_token()}}',
                "add": add,

            },

            success: function(result) {
                
                $('#change_address').html(result);
            
            }

        })

    })
   


})

     
$(document).on("click", ' #add_address', function() {

    var name = $('#fname').val();
    var lname = $('#lname').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var address = $('#address').val();
    var pincode = $('#pincode').val();
    var state = $('#state').val();
    var country = $('#country').val();
    var exist_address = $('#choose_add').val();

    if (name && lname && email && phone && address && pincode && state && country) {

        function validation(email,phone,pincode)
        {
            var email_check = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var phone_check = /^[1-9][0-9]{9}$/;
            var pincode_check = /^\d{6}$/;

            if(!email.match(email_check))
            {   
                $(" #address_error").html('Sorry... invalid email');
                return false;

            }

            if(!phone.match(phone_check))
            {
        
                $(" #address_error").html('Sorry... invalid phone no');
                return false;
            }

            if(!pincode.match(pincode_check))
            {
        
                $(" #address_error").html('Sorry... invalid pincode');
                return false;
            }

            return true;
          
        }

        var check = validation(email,phone,pincode)

        if (check) {

            $.ajax({

                url: '{{route('add_address')}}',

                type: 'post',

                data: {

                    " _token": '{{csrf_token()}}',
                    "name": name,
                    "lname": lname,
                    "email": email,
                    "phone": phone,
                    "address": address,
                    "pincode": pincode,
                    "state": state,
                    "country": country,
            
                },

                success: function(result) {
        
                    console.log(result)
                    window.location.reload();
                }

            })
        }
        else{
            
            $(" #address_error").css("display", "block");
        }

        

    }else{
        $(" #address_error").html('All fileds are required');
        $(" #address_error").css("display", "block");
    }


    })


</script>

@endsection