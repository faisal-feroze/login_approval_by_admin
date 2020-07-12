<x-dashboard-user>
    @section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Placed Orders</h1>

    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Registered Users</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>SL</th>
                <th>Order Date</th>
                <th>Pickup Date</th>
                <th>Pickup Address</th>
                <th>Customer Name</th>
                <th>Customer Info</th>
                <th>Admin Note</th>
                <th>Total Price</th>
                <th>Parcel Status</th>
                <th>Delivery Date</th>
                <th>Code</th>
                <th>Updated At</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>SL</th>
                <th>Order Date</th>
                <th>Pickup Date</th>
                <th>Pickup Address</th>
                <th>Customer Name</th>
                <th>Customer Info</th>
                <th>Admin Note</th>
                <th>Total Price</th>
                <th>Parcel Status</th>
                <th>Delivery Date</th>
                <th>Code</th>
                <th>Updated At</th>
              </tr>
            </tfoot>
            <tbody>
            
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
                    
                
            </tbody>
          </table>
        </div>
      </div>
    </div>
    @endsection
</x-dashboard-user>