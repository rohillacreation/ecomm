@include('admin.layouts.app')

<div class="main-container multivendors" id="container">


    @include('admin.layouts.sidebar')

        <div id="content" class="main-content">

            <div class="d-flex justify-content-between mb-10 mt-30">
                
                <div class="page-heading">

                    <h6>Files <span>/ All Files</span></h6>

                </div>
                
                <div class="page-heading">

                    <a href="{{route('admin.gallery_new')}}"><button class="btn btn-warning">Add File</button></a>
                
                </div>

            </div>

            <div class="allstd-page " id="navbarscroll">

                @if(session('wrong'))

                    <span class="text-denger">{{session('wrong')}}</span>

                @endif


                @if(session('message'))

                    <span class="text-success">{{session('message')}}</span>

                @endif


                @if(count($errors) > 0)
                
                    @foreach ($errors->all() as $error)

                        <span class="text-denger">{{$error}}</span>

                    @endforeach

                @endif
                <div class="card mt-2" style="height: 700px;">
                    <div class="card-header d-flex justify-content-between p-1">

                        <h5>Files</h5>

                        <form action="{{route('admin.gallery_sort')}}" method="GET" id="order">
                            <select class="btn btn-success p-2 m-1" name="sort" id="sort">
                                <option value="0">asc</option>
                                <option value="1">dsc</option>
                            </select>
                        </form>
                        

                    </div>
                    <div class="card-body">
                        
                        <div class="row p-1">
                        
                            @foreach ($members as $item)
                                
                                <div class="col-md-3 pt-1">
                                    <div class="card">
        
                                        <div class="card-body p-1 align-center">
                                            <img src="{{asset('uploads/gallery/'.$item['location'])}}" alt="pic" width="100%" height="100px">
                                        </div>
                                        <div class="card-footer p-1">
                                            <div class="d-flex justify-content-between p-0">
                                                <p class="p-0">{{substr($item->name,0,10)}}...</p>
                                                <i title="Delete" class="c-icon fa fa-trash" onclick="del_file({{$item->id}})" ></i>
                                            </div>
                                            @php
                                                $fileize = File::size(public_path('uploads/gallery/'.$item['location']));
                                            @endphp
                                            <small>{{$fileize}}KB</small>
                                        </div>
                                    </div>
                                </div>
        
                            @endforeach
        
                        </div>

                    </div>
                    <div class="card-footer d-flex justify-content-between ">
                        <p>&nbsp;</p>
                        <p>{{$members->links()}}</p>

                    </div>
                </div>

            </div>
            
            
        </div>

</div>

<script>

    $(' #sort').change(function () {
        $('#order').submit()
    })

    function del_file(id){
    
        var check = confirm('Are sure to delete this brand') 
    
        if (check) {
    
            var asset  = '{{asset('/admin/gallerydelete' )}}'
            var url  = asset + "/" + id 
    
            window.location.replace(url)
    
        }

    }
        
    </script>

@include('admin.layouts.footer') 