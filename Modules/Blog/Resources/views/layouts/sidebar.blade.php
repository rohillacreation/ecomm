<sidebar id="Sidebar">

  <header>My Menu <span><i class="fas fa-times" onclick="OpenSideBar()"></i></span></header>
  <br>
  <li>
    <a href="{{ route('admin.dashboard') }}" class="active">
      <i class="fas fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>

    <ul>
      <!-- <li id="link"><a href="">Add</a></li>
      <li id="link"><a href="#">Update</a></li>
      <li id="link"><a href="#">delte</a></li> -->
    </ul>

  </li>


  <li>

    <a href="{{ route('admin.staff') }}" class="active">
      <i class="fas fa-users"></i>
      <span>Staff</span>
    </a>
    <ul>
      <li id="link"> <a href="#">Add</a> </li>
      <li id="link"> <a href="#">Update</a> </li>
      <li id="link"> <a href="#">delte</a> </li>
    </ul>

  </li>


  <li>

    <a href="{{ route('admin.attribute') }}" class="active">
      <i class="fas fa-hashtag"></i>
      <span>Attributes</span>
    </a>
    <ul>
      <li id="link"> <a href="{{ url('admin/value') }}">Attribute Values</a> </li>

      <li id="link"> <a href="{{ url('admin/valueAdd') }}">Add Values</a> </li>

    </ul>

  </li>


  <li>

    <a href="{{ route('admin.gallery') }}" class="active">
      <i class="fas fa-images"></i>
      <span>Gallery</span>
    </a>
    <ul>
      <!-- <li id="link"> <a href="#">Add</a> </li> -->
    </ul>

  </li>

  <li>

    <a href="{{ route('admin.All_product') }}" class="active">
      <i class="fas fa-box"></i>
      <span>Products</span>
    </a>
    <ul>

      <li id="link"> <a href="{{ route('admin.product') }}">Add Product</a></li>

      <li id="link"> <a href="{{ url('admin\category') }}">Categories</a></li>

      <li id="link"> <a href="{{ url('admin\brand') }}">Brands</a></li>

      <li id="link"> <a href="{{ url('admin\color') }}">Colors</a></li>


    </ul>

  </li>


  <li>

    <a href="{{ route('admin.blog') }}" class="active">
      <i class="fas fa-box"></i>
      <span>Blogs</span>
    </a>
    <ul>

      <li id="link"> <a href="{{ route('admin.create_blog') }}">Add blog</a></li>

    </ul>

  </li>

</sidebar>