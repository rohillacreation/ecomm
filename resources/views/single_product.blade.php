<x-app-layout>

    @if(session('wrong'))

        <div class="bg-red-100 border border-red-400 text-red-700 px-4 m-3 py-3 rounded relative" role="alert">

            <span class="block sm:inline">{{session('wrong')}}</span>

        </div>

    @endif

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-3 bg-white border-b border-gray-200">

                    <div id="var-result" class="grid grid-cols-4 gap-4">
                            
                            <div class="col-span-2">
                                
                                <img class="border-2 border-gray-300" src="{{asset('uploads/gallery/'.$product['location'])}}" alt="var_image">
                            
                            </div>
                            
                            <div class="col-span-2">

                                <div class="grid justify-items-center">

                                    <h3 class="text-lg">{{$product->name}}</h3>

                                    @if (!empty($product->sku))

                                        <h3 class="text-sm">{{$product->sku}}</h3>
                                    @endif

                                    @if ($product->quantity > 2)

                                        <h3 class="text-xl text-red-600">₹.  {{$product->price}}</h3>

                                        <div class="flex justify-around p-5">
                                            
                                            <label for="quantity">Quantity:</label>

                                            @if ($product->quantity < 5)

                                                <select id="value_quantity" value="1" class="rounded">
                                                    <option selected value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>

                                            @elseif($product->quantity <= 10)
                                                <select id="value_quantity" class="rounded" value="1">
                                                    <option selected value="1" selected>1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            @elseif ($product->quantity > 10)
                                                <select value="1" id="value_quantity" class="rounded">

                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="14">15</option>

                                                </select>
                                            @endif
                                            
                                        </div>

                                        <div class="flex justify-around p-5">

                                            <button style="height:40px;width:120px;" class="text-white text-base bg-blue-500 w-full px-10 mx-5 border border-blue-900 rounded-sm" onclick="add_cart({{$product->id}},0)">+Cart</button>
                                            <button style="height:40px;width:120px;" class="text-white text-base bg-blue-500 w-full px-10 mx-5 border border-blue-900 rounded-sm" onclick="buy_now({{$product->id}},0)">Buy_now</button>
                                                
                                        </div>

                                    @else

                                        <h3 class="text-sm text-red-600">Sorry, product not available yet.</h3>

                                    @endif

                                </div>

                            </div>
                        
                    </div><br><hr><br>


                    <div id="var-check">

                        @if(count($variants) > 0)

                        <h5 class="text-base">variants avaliable</h5>

                        Choose variant:
                        <select id="var_change" value="" class="rounded">

                            <option value="0">None</option>
                            
                            @foreach($variants as $value)

                                <option value="{{$value->id}}">{{$value->name}}</option>
                            
                            @endforeach
                            
                        </select>

                        <input type="hidden" id="pro_id" value="{{$product->id}}">

                        @endif

                    </div>
                              
                </div>
                    
                
            </div>
        </div>
    </div>
   
    <div id="search_result" class="bg-black bg-opacity-50 min-w-full absolute inset-0 hidden justify-center items-center">

            <div class="bg-gray-100 max-w-prose py-1 px-1 rounded shadow-xl" style="width: 80%;">

                <div class="flex m-1 justify-between items-center header">

                    <span>Results</span>
                    <span id="hide_result" class="cursor-pointer"><i class="fa fa-times" aria-hidden="true"></i></span>

                </div>
                <hr>
                <br>
                <div class="m-1 Modal-content" id="search_content">
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aperiam veritatis beatae itaque porro nobis numquam voluptas sunt. Eligendi sed deserunt perspiciatis quidem cum repellat totam cumque non commodi! Iure, ullam.
                        Facilis incidunt nihil pariatur. Velit, quod earum! Voluptatibus, corporis ratione! Dolore nemo libero quibusdam cumque laborum, labore in, iste, saepe iure quod facere eveniet dolores. Adipisci deleniti obcaecati nisi voluptatem?
                        Fuga provident
                    </p>
                </div>

            </div>
    </div>

    <div id="pop" class="bg-black bg-opacity-50 min-w-full absolute inset-0 hidden justify-center items-center">

            <div class="bg-gray-100 max-w-md py-1 px-1 rounded shadow-xl" style="width: 80%;">

                <div class="flex m-1 justify-between items-center header">

                    <span>&nbsp;</span>
                    <span id="hide_pop" class="cursor-pointer"><i class="fa fa-times" aria-hidden="true"></i></span>

                </div>
                <hr>

                <div class="m-1 Modal-content grid justify-items-center" id="pop_content">

                </div>

            </div>
    </div>


@include('layouts.fuctions-js')
</x-app-layout>