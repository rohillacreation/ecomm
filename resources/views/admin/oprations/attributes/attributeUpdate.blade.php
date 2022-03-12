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

                <form action="{{route('admin.attributeUpdate')}}" class="d-flex justify-content-center mb-10 mt-30" method="POST">
                    
                    <div class="pdt-infor">

                        <h5>Attribute Details</h5>

                        @csrf
                        <input name="id" value="{{$data->id}}" type="text" class="form-control" placeholder="type">

                        <div class="form-group row mb-3">
                            <label for="title" class="col-sm-3 col-form-label">Attribute<span>*</span></label>
                            <div class="col-sm-9">
                                <input name="name" value="{{$data->name}}" type="text" class="form-control" placeholder="type">
                            </div>
                        </div>

                        <button type="submit" id="Submit_form" class="btn btn-warning">Done</button>
                        
                    </div>


                </form>

            </div>

        </div>

</div>

@include('admin.layouts.footer')