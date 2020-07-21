<x-dashboard-admin>
    @section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Orders of Company: {{$user->name}}</h1>

    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Orders of Company: {{$user->name}} </h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <form action="{{route('cash_memo')}}" method="post">
            @csrf
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                      <th>SL</th>
                      <th>Choose</th>
                      <th>Order Date</th>
                      <th>Customer Info</th>
                      <th>Product Info</th>
                      <th>Total Price</th>
                      <th>Parcel Status</th>
                      <th>Code</th>
                      <th>Dilevery Charge</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                      <th>SL</th>
                      <th>Choose</th>
                      <th>Order Date</th>
                      <th>Customer Info</th>
                      <th>Product Info</th>
                      <th>Total Price</th>
                      <th>Parcel Status</th>
                      <th>Code</th>
                      <th>Dilevery Charge</th>
                  </tr>
                </tfoot>
                <tbody>    
                  @foreach($orders as $order)
                
                    <tr>
                        <td>{{$count++}}</td>
                        <td><input type="checkbox" value="{{$order->id}}" name="choose[]"></td>
                        <td>{{$order->created_at->diffForHumans()}}</td>
                        <td>Name: {{$order->customer_name}} <br> Address: {{$order->customer_address}}</td>
                        <td>Product Info: {{$order->product_des}} <br> Quantity: {{$order->quantity}} </td>
                        <td>{{$order->amount}}</td>
                        <td>{{$order->status}}</td>   
                        <td>{{$order->order_code}}</td>
                        <td>
                          @if($order->status == 'returned') 
                            <input type="number" min="0" name="delivery_charge[]" value="0">
                          @else 
                            <input type="number" min="0" name="delivery_charge[]">
                          @endif
                        
                        </td>
                    </tr>
                  @endforeach  
                </tbody>   
              </table>
              <input type="hidden" value="{{$user->id}}" name="user_id">
              <button type="submit" class="btn btn-success">Cash Memo</button>
            </form>
          </div>
        </div>
      </div>

    @endsection
</x-dashboard-admin>