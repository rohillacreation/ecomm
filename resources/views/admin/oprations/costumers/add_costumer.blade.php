@include('admin.layouts.app')

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container multivendors" id="container">

@include('admin.layouts.sidebar')

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content wallet">

            <div class="row justify-content-between align-items-center mb-10 mt-30">
                <!-- Page Heading Start-->
                <div class="col-12 col-lg-auto mb-2 pt-4 ">
                    <div class="page-heading">
                        <h6>Customer <span>/ Customer Profile</span></h6>
                    </div>
                </div>
                <!--Page Heading End -->
            </div>

            <div class="std-prof tech_profile">
                <h2 class="pb-3"> Add New</h2>


                @if ($errors->any())
                <div class="alert alert-danger">
                     <ul>
                       @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                       @endforeach
                      </ul>
                </div>
                @endif
 


                @if (\Session::has('success'))
                      <div class="alert alert-success">
                    <ul>
                     <li> <h4 style="color: green;"> {!! \Session::get('success') !!} </h4></li>
                       </ul>
                  </div>
                @endif
                <form action="{{asset('admin/add_costumer')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name"> 
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone No.</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pone" placeholder="Phone" name="phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  name="email" id="email" placeholder="user@gmail.com">
                        </div>
                    </div>
                  
                    <!-- <div class="form-group row">
                        <label for="Address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text-area" class="form-control" name="address" id="Address" placeholder="Address">
                        </div>
                    </div> -->

                  

                    <div class="form-group row">
                        <label for="NewPassword" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  name="password" id="NewPassword" placeholder="New Password">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="Re-EnterPassword" class="col-sm-2 col-form-label">Re-Enter Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="conform_password" id="Re-EnterPassword"
                                placeholder="Re-Enter Password">
                        </div>
                    </div>


                    <!-- <div class="bank_del allstd-page">
                        <h3 class="pt-3 pb-2">Account Details</h3>
                        <form>
                            <div class="form-group row">
                                <label for="accholder" class="col-sm-2 col-form-label">Account Holder</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="accholder" placeholder="Account Holder">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="accnum" class="col-sm-2 col-form-label">Account Number</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="accnum" placeholder="Account Number">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bank" class="col-sm-2 col-form-label">Bank Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="bank" placeholder="Bank Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ifsc" class="col-sm-2 col-form-label">IFSC Code</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="Code" placeholder=" IFSC Code">
                                </div>
                             </div> -->

                            <div class="form-group">
                                <button class="s-btn btn-primary" type="submit">Save</button>
                            </div>

                        </form>
                    </div> 


            </div>


        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->



    @include('admin.layouts.footer') 
