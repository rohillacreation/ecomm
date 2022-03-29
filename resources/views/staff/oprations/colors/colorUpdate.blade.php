@include('admin.layouts.app')

<div class="main-container multivendors" id="container">

        @include('admin.layouts.sidebar')

        <div id="content" class="main-content">

            <div class="d-flex justify-content-between mb-10 mt-30">
                
                <div class="page-heading">

                    <h6>Color <span>/ Update Color </span></h6>

                </div>

            </div>

            <div class="allstd-page addblog" id="navbarscroll">

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

            <form action="{{route('admin.colorupdate')}}" class="d-flex justify-content-center mb-10 mt-30" method="POST">
                    
                <div class="pdt-infor">

                    @csrf

                    <input type="hidden" value="{{$data->id}}" name="id">

                    <div class="form-group row mb-3">
                        <label for="title" class="col-sm-3 col-form-label">Color Name<span>*</span></label>
                        <div class="col-sm-9">
                            <input name="name" value="{{$data->name}}" type="text" class="form-control" placeholder="Name">
                        </div>
                    </div>

                    <button type="submit" id="Submit_form" class="btn btn-warning">Done</button>
                    
                </div>


            </form>           

                
            </div>

        </div>

</div>

@include('admin.layouts.footer')