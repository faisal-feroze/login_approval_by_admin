<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      ABOUT ME
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link" href="#">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>My Company</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
      All ORDERS
    </div>

    <li class="nav-item active">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Orders</span>
      </a>
      <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">All Orders:</h6>
          <a class="collapse-item" href="{{route('choose-create')}}">Bulk Orders</a>
          <a class="collapse-item" href="{{route('placed')}}">Placed Orders</a>
          <a class="collapse-item" href="{{route('running')}}">Running Orders</a>
          <a class="collapse-item" href="{{route('returned')}}">Returned Orders</a>
          <a class="collapse-item" href="{{route('user_delivered')}}">delivered Orders</a> 
        </div>
      </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      ORDER ARCHIVE
    </div>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('show_user') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Orders</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
      DOCUMENTS
    </div>

    <li class="nav-item">
      <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Cash Memos</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>