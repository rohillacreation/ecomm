<div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
    <div class="modal-content" style="width:100%;">
      <div class="modal-header">
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item"> 
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                  aria-controls="pills-home" aria-selected="true">Select</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                  aria-controls="pills-profile" aria-selected="false">Upload</a>
            </li>
        </ul>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row">
                @foreach($images as $image)
                    <div class="col-sm-2">
                      <img class="remove_image" width="150px" height="100px" onclick="Meta_Image(`{{$image['id']}}`)" src="{{asset('uploads/gallery/'.$image['location'])}}" alt="">
                  </div>
                @endforeach
              </div>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
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
      <div class="modal-footer meta_links d-flex justify-content-between">
        {{ $images->links()}}
        <button type="button" class="btn btn-warning" data-dismiss="modal">Done</button>
      </div>
    </div>
  </div>

