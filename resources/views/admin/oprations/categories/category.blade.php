@include('admin.layouts.app')

<div class="main-container multivendors" id="container">


    @include('admin.layouts.sidebar')

        <div id="content" class="main-content">

            <div class="d-flex justify-content-between mb-10 mt-30">
                
                <div class="page-heading">

                    <h6>Category <span>/ All Category</span></h6>

                </div>
                
                <div class="page-heading">
                    <a href="{{route('admin.category_new')}}"><button class="btn btn-warning">Add category</button></a>
                </div>

            </div>

            <div class="allstd-page " id="navbarscroll">

                @if(session('wrong'))
                    {{session('wrong')}}
                @endif


                @if(session('message'))
                    {{session('message')}}
                @endif


                @if(count($errors) > 0)
                
                    @foreach ($errors->all() as $error)
                        {{$error}}
                    @endforeach

                @endif

                <table class="table table-striped custab">
                    <thead>
                        <th>Name</th>
                        <th>Status</th>
                        <th>main_id</th>
                        <th>options</th>
                    </thead>
                    <tbody>
                        @foreach ($members as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->status}}</td>
                                <td>{{$item->main_id}}</td>
                                <td>
                                    
                                    <a href="{{asset('/admin/category_edit/'.$item->id)}}"><i title="Edit" class="fa c-icon fa-pencil"></i></a>
                                    
                                    <i title="Delete" data-del-id="{{$item->id}}" class="c-icon fa fa-trash" onclick="del_category({{$item->id}})" aria-hidden="true"></i>
                                
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <p>{{$members->links()}}</p>

            </div>

        </div>

</div>

<script>

    function del_category(id){
    
        var check = confirm('Are sure to delete this brand') 
    
        if (check) {
    
            var asset  = '{{asset('/admin/category_del' )}}'
            var url  = asset + "/" + id 
    
            window.location.replace(url)
    
        }

    }
        
    </script>

@include('admin.layouts.footer') 