<x-dashboard-user>
    @section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Create Order</h1>

    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif

    <div>
        <form method="post" action="{{route('store')}}">
            @csrf
            <p class="border-bottom-primary">Pickup Information</p>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">Pickup Date</label>
              <div class="col-sm-10">
                <input type="date" name="pick_up_date" class="form-control" id="" placeholder="">
              </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Pickup Address</label>
                <div class="col-sm-10">
                  <textarea name="pick_up_address" class="form-control" id="" cols="22" rows="7"></textarea>
                </div>
            </div>

  
            <p class="border-bottom-primary">Customer Information</p>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="customer_name" class="form-control" id="" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Mobile</label>
                <div class="col-sm-10">
                  <input type="text" name="customer_mobile" class="form-control" id="" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Addess</label>
                <div class="col-sm-10">
                    <textarea name="customer_address" class="form-control" id="" cols="22" rows="7"></textarea>
                </div>
            </div>


            <p class="border-bottom-primary">Parcel Information</p>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Order Code</label>
                <div class="col-sm-10">
                  <input type="text" name="order_code" class="form-control" id="" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Product Description</label>
                <div class="col-sm-10">
                  <input type="text" name="product_des" class="form-control" id="" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Quantity</label>
                <div class="col-sm-10">
                  <input type="number" name="quantity" class="form-control" id="" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Cash Amount (Including Delivery Charge)</label>
                <div class="col-sm-10">
                  <input type="number" name="amount" class="form-control" id="" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Pay By</label>
                <div class="col-sm-10">
                  <input type="text" name="pay_by" class="form-control" id="" placeholder="">
                </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Delivery Date</label>
                <div class="col-sm-10">
                  <input type="date" name="delivery_date" class="form-control" id="" placeholder="">
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Customer Note</label>
                <div class="col-sm-10">
                  <input type="text" name="customer_note" class="form-control" id="" placeholder="">
                </div>
            </div>


            <div class="form-group row">
              <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-primary">Save Order</button>
              </div>
            </div>
          </form>
    </div>


    @endsection
</x-dashboard-user>