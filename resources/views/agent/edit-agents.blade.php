<x-dashboard-admin>
    @section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Create Agents</h1>

    <!-- DataTales Example -->
    <div>

        <form action="{{ route('agents.update',$agent->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" class="form-control" id="" value="{{$agent->name}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Mobile</label>
                <div class="col-sm-10">
                  <input type="text" name="phone" class="form-control" id="" value="{{$agent->phone}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-10">
                  <input type="email" name="email" class="form-control" id="" value="{{$agent->email}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Addess</label>
                <div class="col-sm-10">
                    <textarea name="address" class="form-control" id="" cols="12" rows="5">{{$agent->address}}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">NID</label>
                <div class="col-sm-10">
                  <input type="text" name="NID" class="form-control" id="" value="{{$agent->NID}}">
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select class="form-control" name="status">
                        <option selected>{{$agent->status}}</option>
                        <option value="active">Active</option>
                        <option value="deactive">Deactive</option>
                    </select>
                </div> 
            </div>

            <div class="form-group row">
                <div class="col-sm-12 text-right">
                  <button type="submit" class="btn btn-primary">Update Agent</button>
                </div>
            </div>


        </form>
      
      

    </div>
    @endsection
</x-dashboard-admin>