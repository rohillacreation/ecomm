@include('admin.layouts.app')

<div class="main-container multivendors" id="container">

        @include('admin.layouts.sidebar')

        <div id="content" class="main-content">

            <div class="d-flex justify-content-between mb-10 mt-30">
                
                <div class="page-heading">

                    <h6>Color <span>/ All Color </span></h6>

                </div>

            </div>

            <div class="allstd-page addblog" id="navbarscroll">
                
            @if(session('wrong'))

                <span  class="text-danger">{{session('wrong')}}</span>
            
            @endif


            @if(session('message'))

                <span class="text-success" >{{session('message')}}</span>

            @endif


            @if(count($errors) > 0)
    
                @foreach ($errors->all() as $error)

                    <span class="text-danger">{{$error}}</span>

                @endforeach

            @endif

                <div class="row">

                    <div class="col-md-6">

                        <table class="table table-striped custab">
                            <thead>
                                <th>#.</th>
                                <th>Name</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($members as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->name}}</td>
        
                                        <td>
                                            <a href="{{asset('/admin/colorEdit/'.$item->id)}}"><i title="Edit" class="fa c-icon fa-pencil"></i></a>
                                            <i title="Delete" class="c-icon fa fa-trash" onclick="del_color({{$item->id}})" ></i>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        <p>{{$members->links()}}</p>

                    </div>


                    <div class="col-md-6">

                        <form action="{{route('admin.colorstore')}}" class="d-flex justify-content-center mb-10 mt-30" method="POST">
                    
                            <div class="pdt-infor">
                                
                                @csrf
        
                                <div class="form-group row mb-3">
                                    <label for="title" class="col-sm-3 col-form-label">Color<span>*</span></label>
                                    <div class="col-sm-9">
                                        <input name="name" value="" type="text" class="form-control" placeholder="Name">
                                    </div>
                                </div>
        
                                <button type="submit" id="Submit_form" class="btn btn-warning">Done</button>
                                
                            </div>
        
        
                        </form>

                    </div>

                </div>

                
            </div>

        </div>

</div>

<script>

function del_color(id){

    var check = confirm('Are sure to delete this color') 

    if (check) {

        var asset  = '{{asset('/admin/colorDelete' )}}'
        var url  = asset + "/" + id 

        window.location.replace(url)

    } else {

        console.log('i am else false')
    }
}
    
</script>

@include('admin.layouts.footer')