<x-dashboard-admin>
    @section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Paid Orders</h1>

    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif

    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">All Paid Orders</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>SL</th>
                    <th>Company Name</th>
                    <th>Order Date</th>
                    <th>Customer Reference</th>
                    <th>Customer Info</th> 
                    <th>Delivery Agent</th>    
                    <th>Total Price</th>
                    <th>Parcel Status</th>
                    <th>Payment Status</th>
                    <th>Code</th>
                    <th>Updated At</th>
                    <th>Cash Memo</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>SL</th>
                    <th>Company Name</th>
                    <th>Order Date</th>
                    <th>Customer Reference</th>
                    <th>Customer Info</th> 
                    <th>Delivery Agent</th>    
                    <th>Total Price</th>
                    <th>Parcel Status</th>
                    <th>Payment Status</th>
                    <th>Code</th>
                    <th>Updated At</th>
                    <th>Cash Memo</th>
                </tr>
              </tfoot>
              <tbody>
  
                @foreach($orders as $order)
                  @php
                    $memo = App\Invoice::where('order_id','=',$order->id)->pluck('memo_no')->first();
                  @endphp
              
                  <tr>
                      <td>{{$count++}}</td>
                      <td>{{$order::find($order->id)->user->name}}</td>
                      <td>{{$order->created_at->diffForHumans()}}</td>
                      <td></td>
                      <td>Name: {{$order->customer_name}} <br> Adress: {{$order->customer_address}}</td>
                      <td>{{ App\Agent::find($order->delivery_agent_id)->name }}</td>                
                      <td>{{$order->amount}}</td>
                      <td>{{$order->status}}</td>
                      <td>{{$order->bill_status}}</td>
                      <td>{{$order->order_code}}</td>
                      <td>{{$order->updated_at->diffForHumans()}}</td>
                      {{--  <td>{{ App\Invoice::select('memo_no')->where('order_id','=',$order->id)->get() }}</td>  --}}
                      <td> <a href="{{route('view.invoice',['memo'=> $memo])}}">{{$memo}}</a></td>
                  </tr>
                @endforeach
                      
                  
              </tbody>
            </table>
          </div>
        </div>
      </div>

    @endsection
</x-dashboard-admin>