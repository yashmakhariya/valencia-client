<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #111; background-image: none;" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand" href="/admin/dashboard">
        <div class="h5 text-capitalize font-weight-bold sidebar-brand-text mx-3"><img src="{{url('images/logo-white.png')}}" alt="logo" height="20"></div>
    </a>

    <br>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Main Pages
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item" id="dashboard-tab">
        <a class="nav-link" href="{{url('admin/dashboard')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    @if (Auth::guard('admin')->user()->role != 0)

    <!-- Divider -->
    <hr class="sidebar-divider mb-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item" id="add-product-tab">
        <a class="nav-link" href="{{url('admin/add-product')}}">
        <i class="fas fa-fw fa-plus-square"></i>
        <span>Add Product</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mb-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item" id="all-product-tab">
        <a class="nav-link" href="{{url('admin/all-product')}}">
        <i class="fas fa-luggage-cart"></i>
        <span>All Products</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mb-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item" id="all-admin-tab">
        <a class="nav-link" href="{{url('admin/all-access')}}">
        <i class="fas fa-user-circle"></i>
        <span>Admin Access</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mb-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item" id="all-coupon-tab">
        <a class="nav-link" href="{{url('admin/all-coupon')}}">
        <i class="fas fa-ticket-alt"></i>
        <span>Coupon Codes</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mb-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item" id="add-newsletter-tab">
        <a class="nav-link" href="{{url('admin/add-newsletter')}}">
        <i class="fas fa-paper-plane"></i>
        <span>Newsletter </span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mb-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item" id="all-newslettermail-tab">
        <a class="nav-link" href="{{url('admin/all-newslettermail')}}">
        <i class="fas fa-envelope"></i>
        <span>Newsletter Emails</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mb-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item" id="all-user-tab">
        <a class="nav-link" href="{{url('admin/all-user')}}">
        <i class="fas fa-user"></i>
        <span>All Users</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mb-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item" id="all-blog-tab">
        <a class="nav-link" href="{{url('admin/all-blog')}}">
        <i class="fas fa-bookmark"></i>
        <span>Blogs</span></a>
    </li>

    @endif

    <!-- Divider -->
    <hr class="sidebar-divider mb-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item" id="all-order-tab">
        <a class="nav-link" href="{{url('admin/all-order')}}">
        <i class="fas fa-shopping-cart"></i>
        <span>All Orders</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider mb-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item" id="setting-tab">
        <a class="nav-link" href="{{url('admin/setting')}}">
        <i class="fas fa-cog"></i>
        <span>Setting</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->