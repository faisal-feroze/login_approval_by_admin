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
      Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('all_orders') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Order Placed</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('picked') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Parcel Picked</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('delivered') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Delivered</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('order_returned_admin') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Returned/Canceled</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('payment_due') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Payment Due</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{ route('paid_orders') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Paid</span></a>
    </li>

    

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Addons
    </div>
  
    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('show_user') }}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>See Users</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('all_agents') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Dilevery Agent</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>