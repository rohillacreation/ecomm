<!--  BEGIN SIDEBAR  -->
<!-- <div class="sidebar-wrapper sidebar-theme">
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
                        <span>costumers</span>
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
                        <a href="{{asset('admin/all_costumers')}}"> All Customer </a>
                    </li>
                    <li>
                        <a href="{{asset('admin/add_costumers')}}"> Add Customer</a>
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
                        <a href="{{asset('admin/all_orders')}}">All Order</a>
                    </li>
                    <li>
                        <a href="{{asset('admin/new_order')}}">Create Order</a>
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
            
        </ul>
    </nav>
</div> -->
<!--  END SIDEBAR  -->





<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins" , sans-serif;
}
::-webkit-scrollbar {
    display: none;
}
.sidebar{
  position: fixed;
  left: 0;
  top: 151px;
  height: 100%;
  width: 78px;
  background: #11101D;
  padding: 6px 14px;
  z-index: 99;
  transition: all 0.5s ease;
}
.sidebar.open{
  width: 250px;
  overflow-y: scroll;
}
.sidebar .logo-details{
  height: 20px;
  display: flex;
  align-items: center;
  position: relative;
}
.sidebar .logo-details .icon{
  opacity: 0;
  transition: all 0.5s ease;
}
.sidebar .logo-details .logo_name{
  color: #fff;
  font-size: 20px;
  font-weight: 600;
  opacity: 0;
  transition: all 0.5s ease;
}
.sidebar.open .logo-details .icon,
.sidebar.open .logo-details .logo_name{
  opacity: 1;
}
.sidebar .logo-details #btn{
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  font-size: 22px;
  transition: all 0.4s ease;
  font-size: 23px;
  text-align: center;
  cursor: pointer;
  transition: all 0.5s ease;
}
.sidebar.open .logo-details #btn{
  text-align: right;
}
.sidebar i{
  color: #fff;
  height: 60px;
  min-width: 50px;
  font-size: 28px;
  text-align: center;
  line-height: 60px;
}
.sidebar .nav-list{
  margin-top: 20px;
  height: 100%;
}
.sidebar li{
  position: relative;
  margin: 8px 0;
  list-style: none;
}
.sidebar li .tooltip{
  position: absolute;
  top: -20px;
  left: calc(100% + 15px);
  z-index: 3;
  background: #fff;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
  padding: 6px 12px;
  border-radius: 4px;
  font-size: 15px;
  font-weight: 400;
  opacity: 0;
  white-space: nowrap;
  pointer-events: none;
  transition: 0s;
}
.sidebar li:hover .tooltip{
  opacity: 1;
  pointer-events: auto;
  transition: all 0.4s ease;
  top: 50%;
  transform: translateY(-50%);
}
.sidebar.open li .tooltip{
  display: none;
}
.sidebar input{
  font-size: 15px;
  color: #FFF;
  font-weight: 400;
  outline: none;
  height: 50px;
  width: 100%;
  width: 50px;
  border: none;
  border-radius: 12px;
  transition: all 0.5s ease;
  background: #1d1b31;
}
.sidebar.open input{
  padding: 0 20px 0 50px;
  width: 100%;
}
.sidebar .bx-search{
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  font-size: 22px;
  background: #1d1b31;
  color: #FFF;
}
.sidebar.open .bx-search:hover{
  background: #1d1b31;
  color: #FFF;
}
.sidebar .bx-search:hover{
  background: #FFF;
  color: #11101d;
}
.sidebar li a{
  display: flex;
  height: 100%;
  width: 100%;
  border-radius: 12px;
  align-items: center;
  text-decoration: none;
  transition: all 0.4s ease;
  background: #11101D;
}
.sidebar li a:hover{
  background: #FFF;
}
.sidebar li a .links_name{
  color: #fff;
  font-size: 15px;
  font-weight: 400;
  white-space: nowrap;
  opacity: 0;
  pointer-events: none;
  transition: 0.4s;
}
.sidebar.open li a .links_name{
  opacity: 1;
  pointer-events: auto;
  width: 100%;
  line-height: 50px;
}
.sidebar li a:hover .links_name,
.sidebar li a:hover i{
  transition: all 0.5s ease;
  color: #11101D;
}
.sidebar li i{
  height: 50px;
  line-height: 50px;
  font-size: 18px;
  border-radius: 12px;
}
.sidebar li.profile{
  position: fixed;
  height: 60px;
  width: 78px;
  left: 0;
  bottom: -8px;
  padding: 10px 14px;
  background: #1d1b31;
  transition: all 0.5s ease;
  overflow: hidden;
}
.sidebar.open li.profile{
  width: 250px;
}
.sidebar li .profile-details{
  display: flex;
  align-items: center;
  flex-wrap: nowrap;
}
.sidebar li img{
  height: 45px;
  width: 45px;
  object-fit: cover;
  border-radius: 6px;
  margin-right: 10px;
}
.sidebar li.profile .name,
.sidebar li.profile .job{
  font-size: 15px;
  font-weight: 400;
  color: #fff;
  white-space: nowrap;
}
.sidebar li.profile .job{
  font-size: 12px;
}
.sidebar .profile #log_out{
  position: absolute;
  top: 50%;
  right: 0;
  transform: translateY(-50%);
  background: #1d1b31;
  width: 100%;
  height: 60px;
  line-height: 60px;
  border-radius: 0px;
  transition: all 0.5s ease;
}
.sidebar.open .profile #log_out{
  width: 50px;
  background: none;
}
.home-section{
  position: relative;
  background: #E4E9F7;
  min-height: 100vh;
  top: 0;
  left: 78px;
  width: calc(100% - 78px);
  transition: all 0.5s ease;
  z-index: 2;
}
.sidebar.open ~ .home-section{
  left: 250px;
  width: calc(100% - 250px);
}
.home-section .text{
  display: inline-block;
  color: #11101d;
  font-size: 25px;
  font-weight: 500;
  margin: 18px
}
@media (max-width: 420px) {
  .sidebar li .tooltip{
    display: none;
  }
}
#content{    padding-left: 100px;}
.sidebar.open ul.nav-list li ul li a {
    color: #969696;
}
.sidebar.open ul.nav-list li ul li {
    list-style: disc;
    padding-bottom: 10px;
}
.sidebar.open ul.nav-list li ul li a:hover{
   background: unset;
   text-decoration:underline;
}
.sidebar.open li a .links_name i {
    float: right;
}
</style>











<div class="scrol">
  <div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus icon'></i>
        <div class="logo_name">Logo</div>
        <i class='fa fa-bars' id="btn" ></i>

    </div>
    <ul class="nav-list">
      <!-- <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li> -->
      <li>
        <a href="{{route('admin.dashboard')}}">
        <i class="fa fa-home" aria-hidden="true"></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="#" >
         <i class='fa fa-users'></i>
         <span class="links_name" data-toggle="collapse" data-target="#Customers" aria-expanded="false" aria-controls="Customers">Customers<i class="fa fa-angle-right ml-4" aria-hidden="true"></i></span>
       </a>
       <span class="tooltip">Customers</span>
              <ul class="collapse pl-4" id="Customers" >
                    <li>
                        <a href="{{asset('admin/all_costumers')}}"> All Customer </a>
                    </li>
                    <li>
                        <a href="{{asset('admin/add_costumers')}}"> Add Customer</a>
                    </li>
              </ul>
     </li>
     <li>
       <a href="#">
         <i class='fa fa-male' ></i>
         <span class="links_name" data-toggle="collapse" data-target="#Staff" aria-expanded="false" aria-controls="Staff">Staff<i class="fa fa-angle-right" aria-hidden="true"></i></span>
       </a>
       <span class="tooltip">Staff</span>
            <ul class="collapse pl-4" id="Staff" >
                <li>
                    <a href="{{asset('admin/all_costumers')}}"> All Staff </a>
                </li>
                <li>
                    <a href="{{asset('admin/add_costumers')}}"> Add Staff</a>
                </li>
            </ul>
     </li>
     <li>
       <a href="#">
         <i class='fa fa-file-o' ></i>
         <span class="links_name" data-toggle="collapse" data-target="#orders" aria-expanded="false" aria-controls="orders">Orders<i class="fa fa-angle-right ml-4" aria-hidden="true"></i></span>
       </a>
       <span class="tooltip">Orders</span>
            <ul class="collapse pl-4" id="orders" >
                <li>
                    <a href="{{asset('admin/all_orders')}}">All Order</a>
                </li>
                <li>
                    <a href="{{asset('admin/new_order')}}">Create Order</a>
                </li>
            </ul>
     </li>
     <li>
       <a href="#">
         <i class='fa fa-shopping-cart' ></i>
         <span class="links_name" data-toggle="collapse" data-target="#product" aria-expanded="false" aria-controls="product">Products<i class="fa fa-angle-right ml-4" aria-hidden="true"></i></span>
       </a>
       <span class="tooltip">Products</span>
            <ul class="collapse pl-4" id="product" >
                <li>
                    <a href="{{route('admin.All_product')}}">All Product </a>
                </li>

                <li>
                    <a href="{{route('admin.new_product')}}">Create New Products</a>
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
     <li>
       <a href="{{asset(route('admin.gallery'))}}">
         <i class='fa fa-cloud-upload' ></i>
         <span class="links_name">Uploaded Files</span>
       </a>
       <span class="tooltip">Uploaded Files</span>
     </li>
     <!-- <li>
       <a href="#">
         <i class='bx bx-heart' ></i>
         <span class="links_name">Saved</span>
       </a>
       <span class="tooltip">Saved</span>
     </li>
     <li>
       <a href="#">
         <i class='bx bx-cog' ></i>
         <span class="links_name">Setting</span>
       </a>
       <span class="tooltip">Setting</span>
     </li> -->
     <!-- <li class="profile">
         <div class="profile-details">
           <img src="profile.jpg" alt="profileImg">
           <div class="name_job">
             <div class="name">Prem Shahi</div>
             <div class="job">Web designer</div>
           </div>
         </div>
         <i class='bx bx-log-out' id="log_out" ></i>
     </li> -->
    </ul>
  </div>
</div>



  <script>
      let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".bx-search");

closeBtn.addEventListener("mouseover", ()=>{ //mouseover->click
  sidebar.classList.toggle("open");
  menuBtnChange();//calling the function(optional)
});

//mouseover->click
searchBtn.addEventListener("mouseover", ()=>{ // Sidebar open when you click on the search iocn//mouseover->click
  sidebar.classList.toggle("open");
  menuBtnChange(); //calling the function(optional)
});

// following are the code to change sidebar button(optional)
function menuBtnChange() {
 if(sidebar.classList.contains("open")){
   closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
 }else {
   closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
 }
}

  </script>