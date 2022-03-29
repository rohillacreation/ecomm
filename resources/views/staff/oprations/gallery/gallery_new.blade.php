@include('admin.layouts.app')

<div class="main-container multivendors" id="container">


    @include('admin.layouts.sidebar')

        <div id="content" class="main-content">

            <div class="d-flex justify-content-between mb-10 mt-30">
                
                <div class="page-heading">

                    <h6>Files <span>/ Add Files</span></h6>

                </div>
                
                <div class="page-heading">
                    <a href="{{route('admin.gallery')}}"><button class="btn btn-outline-warning">Go Back</button></a>
                </div>

            </div>

            <div class="allstd-pageq addblog" id="navbarscroll">

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

                <section>
                    <div class="container pt-2">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        File Upload
                                    </div>
                                    
                                    <div class="card-body text-center align-center">
                                        <form action="{{route('admin.gallerystore')}}" method="POST" enctype="multipart/form-data" class="dropzone dz-clickable" id="image-upload" style="height: 70vh;">
                                            @csrf
                                            <div>
                                                <h4 class="text-center">Click Here to upload</h4>
                                            </div>
                                            <div class="dz-defult dz-message"><span>Droup files here to upload</span></div>
                                        </form>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
</div>
<script>
Dropzone.options.uploadForm = { 

autoProcessQueue: false,
uploadMultiple: true,
parallelUploads: 100,
maxFiles: 10,
maxFilesize: 5,
acceptedFiles: ".jpeg,.jpg,.png",

}

</script>
@include('admin.layouts.footer')