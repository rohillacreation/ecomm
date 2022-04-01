<?php include('header.php') ?>

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container multivendors" id="container">


        <?php include('sidebar_menu.php') ?>

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content wallet">

            <div class="row justify-content-between align-items-center mb-10 mt-30">
                <!-- Page Heading Start-->
                <div class="col-12 col-lg-auto mb-2 pt-4 ">
                    <div class="page-heading">
                        <h6>Staff <span>/ Staff Profile</span></h6>
                    </div>
                </div>
                <!--Page Heading End -->
            </div>

            <div class="std-prof tech_profile">
                <h2 class="pb-3"> Staff Profile</h2>
                <form>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Phone No.</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pone" placeholder="Phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" placeholder="user@gmail.com">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Qualification" class="col-sm-2 col-form-label">Qualification</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="qualification" placeholder="Qualification">
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label for="class" class="col-sm-2 col-form-label">Class</label>
                        <div class="col-sm-10">
                            <select id='testSelect1' multiple>
                                <option value='1' selected> 1</option>
                                <option value='2'> 2</option>
                                <option value='3' selected> 3</option>
                                <option value='4'> 4</option>
                                <option value='5'> 5</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subject" class="col-sm-2 col-form-label">Subject</label>
                        <div class="col-sm-10">
                            <select id='testSelect2' multiple>
                                <option value='1'>Math</option>
                                <option value='2' selected>Hindi</option>
                                <option value='3'>Chemistry</option>
                                <option value='4'>History</option>
                                <option value='5' selected>English</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label for="Qualification" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-10">
                            <div class="tech_loc">
                                <div class="dropdown">
                                    <button onclick="myFunction()" class="dropbtn">Search....</button>
                                    <div id="myDropdown" class="dropdown-content">
                                        <input type="text" placeholder="Search.." id="myInput"
                                            onkeyup="filterFunction()">
                                        <a href="#about">About</a>
                                        <a href="#base">Base</a>
                                        <a href="#blog">Blog</a>
                                        <a href="#contact">Contact</a>
                                        <a href="#custom">Custom</a>
                                        <a href="#support">Support</a>
                                        <a href="#tools">Tools</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label for="subject" class="col-sm-2 col-form-label">Study Mode</label>
                        <div class="col-sm-10">
                            <select id="inputSub" class="form-control">
                                <option selected>Choose...</option>
                                <option>On</option>
                                <option>Offline</option>
                                <option>Online</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label for="membership" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Membership" placeholder="Role">
                        </div>
                    </div>

                    <!-- <div class="form-group row">
                        <label for="Curentpw" class="col-sm-2 col-form-label">Current Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Current Password"
                                placeholder="Current Password">
                        </div>
                    </div> -->

                    <div class="form-group row">
                        <label for="NewPassword" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="NewPassword" placeholder="New Password">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="Re-EnterPassword" class="col-sm-2 col-form-label">Re-Enter Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Re-EnterPassword"
                                placeholder="Re-Enter Password">
                        </div>
                    </div>


                    <div class="bank_del allstd-page">
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
                            </div>

                            <div class="form-group">
                                <button class="s-btn btn-primary" type="submit">Save</button>
                            </div>

                        </form>

                        <!-- <div id="navbarscroll">
                            <h3>Lead History</h3>
                            <table class="table table-striped custab">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Phone No.</th>
                                        <th>Email Address</th>
                                        <th>Date</th>
                                        <th>Subject</th>
                                        <th>Class</th>
                                        <th>Status</th>
                                        <th class="text-center">Study Mode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>ABC</td>
                                        <td>012345678</td>
                                        <td>User@mail.com</td>
                                        <td>dd/mm/yyyy</td>
                                        <td>Math</td>
                                        <td>1</td>
                                        <td>Distributed</td>
                                        <td class="text-center">
                                            <span class="pr-2"><a href="#">Online</a></span>
                                            <span><a href="#">Offline</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>ABC</td>
                                        <td>012345678</td>
                                        <td>User@mail.com</td>
                                        <td>dd/mm/yyyy</td>
                                        <td>Math</td>
                                        <td>1</td>
                                        <td>Distributed</td>
                                        <td class="text-center">
                                            <span class="pr-2"><a href="#">Online</a></span>
                                            <span><a href="#">Offline</a></span>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>

                        <div id="navbarscroll">
                            <h3>Order History</h3>
                            <table class="table table-striped custab">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Phone No.</th>
                                        <th>Email Address</th>
                                        <th>Date</th>
                                        <th>Subject</th>
                                        <th>Class</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th class="text-center">Study Mode</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>ABC</td>
                                        <td>012345678</td>
                                        <td>User@mail.com</td>
                                        <td>dd/mm/yyyy</td>
                                        <td>Math</td>
                                        <td>1</td>
                                        <td>$000</td>
                                        <td>Distributed</td>
                                        <td class="text-center">
                                            <span class="pr-2"><a href="#">Online</a></span>
                                            <span><a href="#">Offline</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>ABC</td>
                                        <td>012345678</td>
                                        <td>User@mail.com</td>
                                        <td>dd/mm/yyyy</td>
                                        <td>Math</td>
                                        <td>1</td>
                                        <td>$000</td>
                                        <td>Distributed</td>
                                        <td class="text-center">
                                            <span class="pr-2"><a href="#">Online</a></span>
                                            <span><a href="#">Offline</a></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> -->

                    </div>


            </div>


        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->



<?php include('footer.php') ?>