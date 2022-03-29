@include('admin.layouts.app')

<div class="main-container multivendors" id="container">

        @include('admin.layouts.sidebar')

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content wallet">

            <div class="row justify-content-between align-items-center mb-10 mt-30">
                <!-- Page Heading Start-->
                <div class="col-12 col-lg-auto mb-2 pt-4 ">
                    <div class="page-heading">
                        <h6>Staff <span>/ All Staff</span></h6>
                    </div>
                </div>
                <!--Page Heading End -->
            </div>

            <div class="lead_mang allstd-page" id="navbarscroll">
                <h2>All Staff</h2>

                <table class="table table-striped custab">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone No.</th>
                            <th>Email Address</th>
                            <th>Date</th>
                            <th>Role</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>1</td>
                        <td>ABC</td>
                        <td>012345678</td>
                        <td>User@mail.com</td>
                        <td>dd/mm/yyyy</td>
                        <td>
                            <div class="dropdown">
                                <button class="dropbtn">Add</button>
                                <div class="dropdown-content">
                                    <a href="#">Admin</a>
                                    <a href="#">Shop Manager</a>
                                    <a href="#">Ecommerce Executive</a>
                                    <a href="#"> Vendors</a>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label><br>
                            <span class="pr-2"><a href="#">Deactive</a></span><span><a href="#">Active</a></span>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>ABC</td>
                        <td>012345678</td>
                        <td>User@mail.com</td>
                        <td>dd/mm/yyyy</td>
                        <td>
                            <div class="dropdown">
                                <button class="dropbtn">Add</button>
                                <div class="dropdown-content">
                                    <a href="#">Admin</a>
                                    <a href="#">Shop Manager</a>
                                    <a href="#">Ecommerce Executive</a>
                                    <a href="#"> Vendors</a>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label><br>
                            <span class="pr-2"><a href="#">Deactive</a></span><span><a href="#">Active</a></span>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>ABC</td>
                        <td>012345678</td>
                        <td>User@mail.com</td>
                        <td>dd/mm/yyyy</td>
                        <td>
                            <div class="dropdown">
                                <button class="dropbtn">Add</button>
                                <div class="dropdown-content">
                                    <a href="#">Admin</a>
                                    <a href="#">Shop Manager</a>
                                    <a href="#">Ecommerce Executive</a>
                                    <a href="#"> Vendors</a>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label><br>
                            <span class="pr-2"><a href="">Deactive</a></span><span><a href="#">Active</a></span>
                        </td>
                    </tr>
                </table>


            </div>


        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->



    @include('staff.layouts.footer') 
