<x-dashboard-admin>
    @section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">MEMO NO: {{$memo}}</h1>

    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">MEMO NO: {{$memo}} </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
        
                <table class="table table-bordered">
                    <tr>
                        <th colspan="1">Date of Deposit</th>
                        <th colspan="6">{{$created_at}}</th>
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
                        <td rowspan="6">{{$company_name}}</td>
                    </tr>
                    @php
                    $total = 0;
                    @endphp
                    @foreach($invoices as $invoice)
                        <tr>
                            <td>{{ App\Order::where('id',$invoice->order_id)->pluck('pick_up_date')->first() }}</td> 
                            <td>{{ App\Order::where('id',$invoice->order_id)->pluck('order_code')->first() }}</td>
                            <td>
                                Name: {{ App\Order::where('id',$invoice->order_id)->pluck('customer_name')->first() }} <br> 
                                Address: {{ App\Order::where('id',$invoice->order_id)->pluck('customer_address')->first() }}
                            </td>
                            <td>
                                Total price: {{$invoice->total_amount}}  <br>
                                Total quantity: {{ App\Order::where('id',$invoice->order_id)->pluck('quantity')->first() }} <br>
                                Parcel Status: {{ App\Order::where('id',$invoice->order_id)->pluck('status')->first() }}
                            </td>
                            <td>{{$invoice->service_charge}} </td>
                            <td>{{$invoice->net_amount}} </td>
                            <?php 
                                $total = $total + ($invoice->net_amount);
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
                        <td>Total Paid</td>
                        <td></td>
                        <td>{{$total}} BDT</td>
                    </tr>
                </table>

                <button type="submit" class="btn btn-success">Print Bills</button>
                
            </div>
        </div>
      </div>

    @endsection
</x-dashboard-admin>