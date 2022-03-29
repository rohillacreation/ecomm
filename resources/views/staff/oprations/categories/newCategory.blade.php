@include('admin.layouts.app')

<div class="main-container multivendors" id="container">


    @include('admin.layouts.sidebar')

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


        @include('admin.layouts.sidebar')

        <div id="content" class="main-content">

            <div class="d-flex justify-content-between mb-10 mt-30">
                
                <div class="page-heading">

                    <h6>Category <span>/ New Category</span></h6>

                </div>

            </div>

            <div class="allstd-pageq addblog" id="navbarscroll">

                <form action="{{route('admin.catgory_store')}}" class="d-flex justify-content-center mb-10 mt-30" method="POST">
                    
                    <div class="pdt-infor">

                        <h5>Category Details</h5>

                        @csrf


                        <div class="form-group row mb-3">
                            <label for="title" class="col-sm-3 col-form-label">Category Name<span>*</span></label>
                            <div class="col-sm-9">
                                <input name="name" value="" type="text" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        
                        <div class="form-group row mb-3">
                            <label for="title" class="col-sm-3 col-form-label">Main_id<span>*</span></label>
                            <div class="col-sm-9">
                                <input name="main_id" value="" type="text" class="form-control" placeholder="main_id">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="slug" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                
                                <select name="status" class="form-control">

                                    <option value="" selected> </option>
                                    <option value="publish">publish</option>
                                    <option value="unpublish">Unpublish</option>
                                
                                </select>

                            </div>
                        </div>

                        <button type="submit" id="Submit_form" class="btn btn-warning">Done</button>
                        
                    </div>

                </form>
                
            </div>

        </div>

</div>

@include('admin.layouts.footer')