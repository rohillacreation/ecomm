<div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
  <div class="modal-content p-1" style="width:100%;" >
    <div class="modal-header d-flex justify-content-between p-1">
        <div>
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item"> 
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#thum_image" role="tab"
                  aria-controls="pills-home" aria-selected="true">Select</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#thum_image_drop" role="tab"
                  aria-controls="pills-profile" aria-selected="false">Upload</a>
            </li>
          </ul>
        </div>

        <div>
          <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">&times;</button>
        </div>
    </div>
    <div class="modal-body">

      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="thum_image" role="tabpanel" aria-labelledby="pills-home-tab">
          <div class="row">
              @foreach($images as $image)
                  <div class="col-md-2 pt-2">
                    <div class="card" onclick="Thumbnail_Image(`{{$image['id']}}`)">
        
                      <div class="card-body p-1 align-center">
                          <img src="{{asset('uploads/gallery/'.$image['location'])}}" alt="pic" width="100%" height="100px">
                      </div>
                      <div class="card-footer p-1">
                        @php
                        $fileize = File::size(public_path('uploads/gallery/'.$image['location']));
                        @endphp
                          <div class="d-flex justify-content-between p-0">
                              <small>{{substr($image->name,0,10)}}...</small>
                              <small>{{$fileize}}KB</small>
                          </div>
                          
                      </div>
                    </div>
                  </div>
              @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="thum_image_drop" role="tabpanel" aria-labelledby="pills-profile-tab">
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
      </div>

    </div>
    <div class="modal-footer p-1 thum_links d-flex justify-content-between">
      {{ $images->links()}}
      <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Done</button>
    </div>
  </div>
</div>