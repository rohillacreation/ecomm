<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">
    <nav id="sidebar">
        <ul class="list-unstyled menu-categories ps ps--active-y" id="accordionExample">

            <li class="menu">
                <a href="{{route('admin.dashboard')}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-book">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                        <span>Customer</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="users" data-parent="#accordionExample">
                    <li>
                        <a href="all_customer.php"> All Customer </a>
                    </li>
                    <li>
                        <a href="customer_profile.php"> Add Customer</a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-file">
                            <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                            <polyline points="13 2 13 9 20 9"></polyline>
                        </svg>
                        <span>Orders</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="submenu list-unstyled collapse" id="pages" data-parent="#accordionExample" style="">
                    <li>
                        <a href="all_order.php">All Order</a>
                    </li>
                    <li>
                        <a href="all_order.php">Create Order</a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle collapsed">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em"
                            height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512">
                            <path fill="currentColor"
                                d="M160 96.039v32h304v63.345l-35.5 112.655H149.932L109.932 16H16v32h66.068l40 288.039h329.9L496 196.306V96.039H160z" />
                            <path fill="currentColor"
                                d="M176.984 368.344a64.073 64.073 0 0 0-64 64a64 64 0 0 0 128 0a64.072 64.072 0 0 0-64-64zm0 96a32 32 0 1 1 32-32a32.038 32.038 0 0 1-32 32z" />
                            <path fill="currentColor"
                                d="M400.984 368.344a64.073 64.073 0 0 0-64 64a64 64 0 0 0 128 0a64.072 64.072 0 0 0-64-64zm0 96a32 32 0 1 1 32-32a32.038 32.038 0 0 1-32 32z" />
                        </svg>
                        <span>Product</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="submenu list-unstyled collapse" id="app" data-parent="#accordionExample" style="">
                    
                    <li>
                        <a href="{{route('admin.All_product')}}">All Product </a>
                    </li>

                    <li>
                        <a href="{{route('admin.new_product')}}">Add product</a>
                    </li>

                    <li>
                        <a href="{{route('admin.category')}}">Categories </a>
                    </li>

                    <li>
                        <a href="{{route('admin.brand')}}">Brands</a>
                    </li>

                    <li>
                        <a href="{{route('admin.attribute')}}">Attributes</a>
                    </li>
                    
                    <li>
                        <a href="{{route('admin.colors')}}">Colors</a>
                    </li>
                    
                </ul>
            </li>

            <li class="menu">
                <a href="{{asset(route('admin.gallery'))}}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-airplay">
                            <path
                                d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1">
                            </path>
                            <polygon points="12 15 17 21 7 21 12 15"></polygon>
                        </svg>
                        <span>Uploaded Files</span>
                    </div>
                </a>
            </li>
            
            <!-- <div class="ps__rail-x" style="left: 0px; bottom: 0px;"> -->
            <!-- <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 646px; right: -4px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 275px;"></div></div> -->
        </ul>
    </nav>
</div>
<!--  END SIDEBAR  -->