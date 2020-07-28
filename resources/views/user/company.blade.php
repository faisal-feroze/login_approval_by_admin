<x-dashboard-user>
    @section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">My Company</h1>

    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif

    <!-- DataTales Example -->
    <div>

        <form action="{{ route('company.update',auth()->user()->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Company Name</label>
                <div class="col-sm-10">
                  <input type="text" name="company_name" class="form-control" id="" value="{{auth()->user()->company_name}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">User Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" class="form-control" id="" value="{{auth()->user()->name}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-10">
                  <input type="email" name="email" class="form-control" id="" value="{{auth()->user()->email}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                  <input type="text" name="phone" class="form-control" id="" value="{{auth()->user()->phone}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Addess</label>
                <div class="col-sm-10">
                    <textarea name="address" class="form-control" id="" cols="5" rows="2">{{auth()->user()->address}}</textarea>
                </div>
            </div>


            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Payment Method</label>
                <div class="col-sm-10">
                    <select class="form-control" name="payment_method">
                        <option selected>{{auth()->user()->payment_method}}</option>
                        <option value="Bkash">Bkash</option>
                        <option value="Rocket">Rocket</option>
                        <option value="Bank Account">Bank Account</option>
                    </select>
                </div> 
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Payment Details</label>
                <div class="col-sm-10">
                    <textarea name="payment_details" class="form-control" id="" cols="5" rows="2">{{auth()->user()->payment_details}}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Account Created At</label>
                <div class="col-sm-10">
                    <div>{{auth()->user()->created_at->diffForHumans()}}</div>
                    
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12 text-right">
                  <button type="submit" class="btn btn-primary">Update Info</button>
                </div>
            </div>


        </form>
      
      

    </div>
    @endsection
</x-dashboard-user>