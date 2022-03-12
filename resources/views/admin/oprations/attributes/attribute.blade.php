@include('admin.layouts.app')

<div class="main-container multivendors" id="container">

        @include('admin.layouts.sidebar')

        <div id="content" class="main-content">

            <div class="d-flex justify-content-between mb-10 mt-30">
                
                <div class="page-heading">

                    <h6>Brands <span>/ All Brands </span></h6>

                </div>

            </div>

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

            <div class="allstd-page addblog" id="navbarscroll">


                <div class="row">

                    <div class="col-md-6">

                        <table class="table table-striped custab">
                            <thead>
                                <th>#.</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($members as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->name}}</td>
        
                                        <td>
                                            <a href="{{asset('admin/att_value/'.$item->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{asset('admin/attributeEdit/'.$item->id)}}"><i title="Edit" class="fa c-icon fa-pencil"></i></a>
                                            <i title="Delete" class="c-icon fa fa-trash" onclick="del_attribute({{$item->id}})" ></i>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        <p>{{$members->links()}}</p>

                    </div>


                    <div class="col-md-6">

                        <form action="{{route('admin.attributestore')}}" class="d-flex justify-content-center mb-10 mt-30" method="POST">
                    
                            <div class="pdt-infor">
        
                                <h5>Brand Details</h5>

                                @csrf
        
                                <div class="form-group row mb-3">
                                    <label for="title" class="col-sm-3 col-form-label">Attribute<span>*</span></label>
                                    <div class="col-sm-9">
                                        <input name="name" value="" type="text" class="form-control" placeholder="type">
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

function del_attribute(id){

    var check = confirm('Are sure to delete this attribute') 

    if (check) {

        var asset  = '{{asset('/admin/attributeDelete' )}}'
        var url  = asset + "/" + id 

        window.location.replace(url)

    }
}
    
</script>

@include('admin.layouts.footer')