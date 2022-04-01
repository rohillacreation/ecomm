
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
                        <h6>Customer <span>/ All Customer</span></h6>
                    </div>
                </div>
                <!--Page Heading End -->

            </div>

            <div class="allstd-page" id="navbarscroll">
                <h2>All Customer</h2>
<?php $i=1; ?>
                <table class="table table-striped custab">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name</th>
                            <th>Phone No.</th>
                            <th>Email Address</th>
                            <!-- <th>Address</th> -->
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    @foreach( $data as $user)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->email}}</td>
                        <!-- <td>{{$user->address}}</td> -->
                        <td class="text-center">
                            <a href="{{asset('admin/customer/edit/'.$user->id)}}"><button style="background-color: orange; color:white; border-radius:9px" >Edit</button> </a>
                            <a href="{{asset('admin/customer/delete/'.$user->id)}}"><button style="background-color: red; color:white ; border-radius:9px">Delete</button> </a>
                        </td>
                    </tr>
                    @endforeach
            
                </table>


            </div>


        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->






    @include('admin.layouts.footer') 
