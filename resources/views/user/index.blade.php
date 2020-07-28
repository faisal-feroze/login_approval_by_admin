<x-dashboard-user>
    
    @section('content')
        <h1>Dashboard</h1>

        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
                <a href="{{route('placed')}}">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Orders Placed</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$order_placed}}</div>
                            </div>
                            {{--  <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>  --}}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
    
            <div class="col-xl-4 col-md-6 mb-4">
                <a href="{{route('running')}}">
                    <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Running Orders</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$order_running}}</div>
                        </div>
                        {{--  <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>  --}}
                        </div>
                    </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <a href="{{route('user_delivered')}}">
                    <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Delivered Orders</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$order_delivered}}</div>
                        </div>
                        {{--  <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>  --}}
                        </div>
                    </div>
                    </div>
                </a>
            </div>
        
            <div class="col-xl-4 col-md-6 mb-4">
                <a href="{{route('returned')}}">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Returned Orders</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$order_returned}}</div>
                            </div>
                            {{--  <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>  --}}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
    
            <div class="col-xl-4 col-md-6 mb-4">
                <a href="{{route('user_completed')}}">
                    <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Completed Orders</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$order_completed}}</div>
                        </div>
                        {{--  <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>  --}}
                        </div>
                    </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <a href="{{route('user_completed')}}">
                    <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Transactions</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$order_transaction}} tk</div>
                        </div>
                        {{--  <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>  --}}
                        </div>
                    </div>
                    </div>
                </a>
            </div>
        </div>
    @endsection

    


</x-dashboard-user>

