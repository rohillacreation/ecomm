@include('admin.layouts.app')

<div class="main-container multivendors" id="container">

        @include('admin.layouts.sidebar')

        <div id="content" class="main-content">

            <div class="d-flex justify-content-between mb-10 mt-30">
                
                <div class="page-heading">

                    <h6>Attribute value <span>/ edit value </span></h6>

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

                <form action="{{route('admin.attribute_value_update')}}" class="d-flex justify-content-center mb-10 mt-30" method="POST">
                    
                    <div class="pdt-infor">
        
                        <h5>Value Details</h5>

                        @csrf
                        <input name="id" value="{{$data->id}}" type="hidden" class="form-control">

                        <div class="form-group row mb-3">
                            <label for="title" class="col-sm-3 col-form-label">Attribute value<span>*</span></label>
                            <div class="col-sm-9">
                                <input name="name" value="{{$data->name}}" type="text" class="form-control" placeholder="">
                            </div>
                        </div>

                        <button type="submit" id="Submit_form" class="btn btn-warning">Done</button>
                        
                    </div>
                            
        
        
                </form>
                
            </div>

        </div>

</div>

@include('admin.layouts.footer')