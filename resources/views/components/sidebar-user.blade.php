<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon" style="font-size:10px !important;">
        {{--  <i class="fas fa-laugh-wink"></i>  --}} Company A
      </div>
      <div class="sidebar-brand-text mx-3">{{auth()->user()->company_name}}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{route('user')}}">
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
      <a class="nav-link" href="{{route('my_company')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>My Company</span></a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
      All ORDERS
    </div>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('choose-create') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Bulk Orders</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('placed') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Placed Orders</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('running') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Running Orders</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('returned') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Returned Orders</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('user_delivered') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Delivered Orders</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('user_completed') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Completed Orders</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

  

    <!-- Heading -->
    {{--  <div class="sidebar-heading">
      DOCUMENTS
    </div>

    <li class="nav-item">
      <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Cash Memos</span></a>
    </li>  --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>