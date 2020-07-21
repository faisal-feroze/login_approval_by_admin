<x-dashboard-admin>
    @section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Orders of Company: </h1>

    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Orders of Company:  </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            
                <table class="table table-bordered">
                    <tr>
                        <th colspan="1">Date of Deposit</th>
                        <th colspan="6">{{date('Y-m-d H:i:s')}}</th>
                    </tr>
                    <tr>
                        <th>Company Name</th>
                        <th>Pick up Date</th>
                        <th>Code No.</th>
                        <th>Customer</th>
                        <th>Parcel & Amount</th>
                        <th>Service Charge</th>
                        <th>Net Amount</th>
                    </tr>
                    <tr>
                        <td rowspan="6">{{$user->name}}</td>
                    </tr>
                    @php
                     $total = 0;
                    @endphp
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->pick_up_date}}</td>
                            <td>{{$order->order_code}}</td>
                            <td>Name: {{$order->customer_name}} <br> Address: {{$order->customer_address}} </td>
                            <td>Total quantity: {{$order->quantity}} <br>Total price: {{$order->amount}}</td>
                            <td>{{$charges[$count]}}</td>
                            <td>{{$order->amount - $charges[$count]}}</td>
                            <?php 
                                $total = $total + ($order->amount - $charges[$count]);
                                $count++;                  
                            ?>
                        </tr>  
                    @endforeach     

                    <tr>
                        <td colspan="3">Total Order: {{$count}}</td>
                        <td>Sub Total</td>
                        <td></td>
                        <td>{{$total}} BDT</td>
                    </tr>
                    <tr>
                        <td colspan="3">Payment Method: Bkash</td>
                        <td>Total to Pay</td>
                        <td></td>
                        <td>{{$total}} BDT</td>
                    </tr>
                </table>

                <button type="" class="btn btn-success">Pay Bills</button>
            </div>
        </div>
      </div>

    @endsection
</x-dashboard-admin>