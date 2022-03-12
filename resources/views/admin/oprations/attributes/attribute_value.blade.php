@include('admin.layouts.app')

<div class="main-container multivendors" id="container">

        @include('admin.layouts.sidebar')

        <div id="content" class="main-content">

            <div class="d-flex justify-content-between mb-10 mt-30">
                
                <div class="page-heading">

                    <h6>Attribute value <span>/ All value </span></h6>

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

                <div class="row">

                    <div class="col-md-6">

                        <table class="table table-striped custab">
                            <thead>
                                <th>#.</th>
                                <th>value</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->name}}</td>
        
                                        <td>
                                            <a href="{{asset('admin/attt_valueEdit/'.$item->id)}}"><i title="Edit" class="fa c-icon fa-pencil"></i></a>
                                            <i title="Delete" class="c-icon fa fa-trash" onclick="del_attribute_value({{$item->id}})" ></i>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>


                    <div class="col-md-6">

                        <form action="{{route('admin.attribute_valueStore')}}" class="d-flex justify-content-center mb-10 mt-30" method="POST">
                    
                            <div class="pdt-infor">
        
                                <h5>Attribute value Details</h5>

                                @csrf
                                <input name="attribute_id" value="{{$attribute[0]->id}}" type="hidden" class="form-control">
        
                                <div class="form-group row mb-3">
                                    <label for="title" class="col-sm-3 col-form-label">Attribute value<span>*</span></label>
                                    <div class="col-sm-9">
                                        <input name="name" value="" type="text" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label for="title" class="col-sm-3 col-form-label">Belongs</label>
                                    <div class="col-sm-9">
                                        <input name="name" value="{{$attribute[0]->name}}" type="text" class="form-control" disabled >
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

function del_attribute_value(id){

    console.log(id)
    console.log('this is working')

    var check = confirm('Are sure to delete this value') 

    if (check) {

        var asset  = '{{asset('/admin/attt_valueDelete')}}'
        var url  = asset + "/" + id 

        window.location.replace(url)

    }
}
    
</script>

@include('admin.layouts.footer')