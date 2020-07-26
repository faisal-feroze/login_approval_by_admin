<x-dashboard-admin>
    @section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Picked Up Orders</h1>

    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif

    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">All Picked Up Orders</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Company Name</th>
                  <th>Order Date</th>
                  <th>Pickup Date</th>
                  <th>Pickup Address</th>
                  <th>Customer Info</th>
                  <th>Admin Note</th>
                  <th>Total Price</th>
                  <th>Parcel Status</th>
                  <th>Delivery Date</th>
                  <th>Code</th>
                  <th>Picked By</th>
                  <th>Action</th>
                  <th>Updated At</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>SL</th>
                    <th>Company Name</th>
                    <th>Order Date</th>
                    <th>Pickup Date</th>
                    <th>Pickup Address</th>
                    <th>Customer Info</th>
                    <th>Admin Note</th>
                    <th>Total Price</th>
                    <th>Parcel Status</th>
                    <th>Delivery Date</th>
                    <th>Code</th>
                    <th>Picked By</th>
                    <th>Action</th>
                    <th>Updated At</th>
                </tr>
              </tfoot>
              <tbody>
               
                @foreach($orders as $order)
              
                  <tr>
                      <td>{{$count++}}</td>
                      <td>{{$order::find($order->id)->user->name}}</td>
                      <td>{{$order->created_at->diffForHumans()}}</td>
                      <td>{{ Carbon\Carbon::parse($order->pick_up_date)->format('Y-m-d') }}</td>
                      <td>{{$order->pick_up_address}}</td>
                      <td>Name: {{$order->customer_name}} <br> Address: {{$order->customer_address}} </td>
                      <td>{{$order->customer_note}}</td>
                      <td>{{$order->amount}}</td>
                      <td>{{$order->status}}</td>
                      <td>{{$order->delivery_date}}</td>
                      <td>{{$order->order_code}}</td> 
                      <td>{{ App\Agent::find($order->pickup_agent_id)->name }}</td>
                      {{--  <td>{{ App\Agent::all()->where('id', $order->pickup_agent_id)->pluck('name')  }}</td>  --}}
                      {{--  <td>{{App\Agent::select('name')->where('id', $order->pickup_agent_id)->get()}}</td>  --}}

                      {{--  <td> 
                        <a href="{{ route('order_delivered',['id'=> $order->id])}}" class="btn btn-success">Delivered</a> 
                        <a href="{{ route('order_returned',['id'=> $order->id])}}" class="btn btn-danger">Canceled</a> 
                      </td>   --}}
                      <td>
                        <form action="{{route('order_delivered', ['id'=> $order->id])}}" method="POST">
                          @csrf
                          @method('PATCH')
                          <select name="agent_id" id="" style="margin-bottom: 20px;" required>
                            <option value="">Select Delivery Man</option>
                            @foreach($agents as $agent)
                              <option value="{{$agent->id}}">{{$agent->name}}</option>
                            @endforeach
                          </select>
                          <div>
                            <p><input type="radio" selected name="after_picked" value="delivered" required>
                              <label for="">Delivered</label>
                            </p>
                            <p> <input type="radio" name="after_picked" value="returned">
                              <label for="">Returned</label>
                            </p>
                          </div>
    
                          <input type="submit" value="Submit" class="btn btn-success">
                        </form>
                      </td>
                      <td>{{$order->updated_at->diffForHumans()}}</td>
  
                  </tr>
                @endforeach
                      
                  
              </tbody>
            </table>
          </div>
        </div>
      </div>

    @endsection
</x-dashboard-admin>