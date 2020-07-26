<x-dashboard-admin>
    @section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Agents</h1>
    <div><a href="{{ route('create_all_agents') }}" class="btn btn-primary">Create New Agent</a></div>

    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Agents</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>SL</th>
                <th>Agent Name</th>
                <th>Phone</th>
                <th>E-mail</th>
                <th>Address</th>
                <th>NID</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>SL</th>
                <th>Agent Name</th>
                <th>Phone</th>
                <th>E-mail</th>
                <th>Address</th>
                <th>NID</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>

              @foreach($agents as $agent)
              
                  <tr>
                      <td>{{$count++}}</td>
                      <td>{{$agent->name}}</td>  
                      <td>{{$agent->phone}}</td>
                      <td>{{$agent->email}}</td>
                      <td>{{$agent->address}}</td>
                      <td>{{$agent->NID}}</td>
                      <td>{{$agent->status}}</td>
                      <td>{{$agent->created_at->diffForHumans()}}</td>    
                      <td>{{$agent->updated_at->diffForHumans()}}</td>
                      <td><a href="{{ route('agents.edit',['id'=> $agent->id]) }}" class="btn btn-primary">Edit</a></td>
  
                  </tr>
                @endforeach
                
            </tbody>
          </table>
        </div>
      </div>
    </div>
    @endsection
</x-dashboard-admin>