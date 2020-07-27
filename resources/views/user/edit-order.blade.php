<x-dashboard-user>
    @section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Order</h1>

    <div>
        <form method="post" action="{{route('order.update',$order->id)}}">
            @csrf
            @method('PATCH')

            <p class="border-bottom-primary">Pickup Information</p>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Pickup Date</label>
              <div class="col-sm-10">
                <input type="date" value="{{$order->pick_up_date}}" name="pick_up_date" class="form-control" id="" placeholder="" required>
              </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Pickup Address</label>
                <div class="col-sm-10">
                  <textarea name="pick_up_address" class="form-control" id="" cols="8" rows="4" required>{{$order->pick_up_address}}</textarea>
                </div>
            </div>

  
            <p class="border-bottom-primary">Customer Information</p>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="customer_name" class="form-control" id="" value="{{$order->customer_name}}" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Mobile</label>
                <div class="col-sm-10">
                  <input type="text" name="customer_mobile" value="{{$order->customer_mobile}}" class="form-control" id="" value="" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Addess</label>
                <div class="col-sm-10">
                    <textarea name="customer_address" value="{{$order->customer_address}}" class="form-control" id="" cols="8" rows="4" required></textarea>
                </div>
            </div>


            <p class="border-bottom-primary">Parcel Information</p>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Product Description</label>
                <div class="col-sm-10">
                  <input type="text" name="product_des" value="{{$order->product_des}}" class="form-control" id="" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Quantity</label>
                <div class="col-sm-10">
                  <input type="number" name="quantity" class="form-control" id="" value="{{$order->quantity}}" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Cash Amount (Including Delivery Charge)</label>
                <div class="col-sm-10">
                  <input type="number" name="amount" class="form-control" id="" value="{{$order->amount}}" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Pay By</label>
                <div class="col-sm-10">
                  <input type="text" name="pay_by" class="form-control" id="" placeholder="" value="{{$order->pay_by}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Delivery Date</label>
                <div class="col-sm-10">
                  <input type="date" name="delivery_date" class="form-control" id="" value="{{$order->delivery_date}}" placeholder="" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Customer Note</label>
                <div class="col-sm-10">
                  <input type="text" name="customer_note" class="form-control" id="" placeholder="" value="{{$order->customer_note}}">
                </div>
            </div>


            <div class="form-group row">
              <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-primary">Update Order</button>
              </div>
            </div>
          </form>
    </div>


    @endsection
</x-dashboard-user>