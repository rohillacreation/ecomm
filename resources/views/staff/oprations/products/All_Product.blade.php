@include('admin.layouts.app')

<div class="main-container multivendors" id="container">

        @include('admin.layouts.sidebar')

        <div id="content" class="main-content">

            <div class="d-flex justify-content-between mb-10 mt-30">
                
                <div class="page-heading">

                    <h6>Products <span>/ Add Product </span></h6>

                </div>

            </div>

            <div class="allstd-page addblog" id="navbarscroll">

            @if(session('wrong'))
            
                <span>{{session('wrong')}}</span>
            
            @endif


            @if(session('message'))

                <span>{{session('message')}}</span>

            @endif


            @if(count($errors) > 0)
    
                @foreach ($errors->all() as $error)

                    <span>{{$error}}</span>

                @endforeach

            @endif
            
            </div>

            <table class="table">

                <thead>
        
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product</th>
                        <th scope="col">Variants</th>
                        <th scope="col">Actions.</th>
                        <th scope="col"></th>
                    </tr>
        
                </thead>
        
                <tbody>
        
                    @foreach($products as $product)
        
                    <tr>
        
                        <th scope="row">{{$loop->iteration}}.</th>
                        <td>
                            <div class="row">
                                <div class="col-md-3">
                                    <p style="font-size:16px;">{{$product->name}}
                                </div>
                                @if($product->location)
        
                                <div class="col">
                                    <img style="width:30px;height:30px;" src="{{asset('uploads/gallery/'.$product['location'])}}" alt="pro img">
                                </div>
                                @endif
                            </div>
                            <p>
                        </td>
                        <td>
        
                            @foreach($product->variant as $variant)
                            <p style="font-size:12px;">{{$variant->name}} -- {{$variant->quantity}}
                            <p>
                                @endforeach
        
                        </td>
        
                        <td>

                            <a href="{{'product_edit/'.$product['id']}}"><i title="Edit" class="fa c-icon fa-pencil"></i></a>
                            <i title="Delete" class="c-icon fa fa-trash" onclick="del_product({{$product->id}})" ></i>
        
                        </td>
        
                    </tr>
        
                    @endforeach
        
                </tbody>
        
            </table>
        
            {{ $products->links()}}
                
                
        </div>

</div>

<script>

    function del_product(id){
    
        var check = confirm('Are sure to delete this product') 
    
        if (check) {
    
            var asset  = '{{asset('/admin/product_delete' )}}'
            var url  = asset + "/" + id 
    
            window.location.replace(url)
            
        } else {
    
            console.log('i am else false')
        }
    }
        
    </script>
