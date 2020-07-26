<x-dashboard-user> 
    @section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Create Order</h1>

    <div>
        <form method="post" action="{{route('store-bulk')}}">
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
                    <textarea name="pick_up_address" class="form-control" id="" cols="15" rows="5"></textarea>
                  </div>
              </div>

              <p class="border-bottom-primary">Parcel Information</p>

              <div class="order_inouts">
                <div class="bulk_input">
                    <p>customers Name/ Phone/ Address/ Cash Amount/ Pay by/ Product info/ Quantity/ Code</p>
                    <div class="form-group row">
                        <label for="text" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                        <textarea name="all_info[]" class="form-control" id="" cols="25" rows="10" 
                        placeholder="Line 1: Customer Name &#10;Line 2: Customer Phone&#10;Line 3: Customer Address &#10;Line 4: Cash Amount &#10;Line 5: Pay by &#10;Line 6: Product Detail &#10;Line 7: Quantity &#10;Line 8: Order Code"></textarea>
                        </div>

                        <label class="col-sm-2 col-form-label">Delivery Date</label>
                        <div class="col-sm-10">
                        <input type="date" name="delivery_date[]" class="form-control" id="" placeholder="">
                        </div>
                    </div>
                </div> 
             </div>

             
             <div class="form-group row">
                <div class="col-sm-12">
                  <a id="add_new_order" class="btn btn-success">Add New Order</a>
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