<x-dashboard-admin>
    @section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Registered Users</h1>

    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Registered Users</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>SL</th>
                <th>Company Name</th>
                <th>Phone</th>
                <th>Username</th>
                <th>Registered at</th>
                <th>Last Update</th>
                <th>Updated By</th>
                <th>Code</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>SL</th>
                <th>Company Name</th>
                <th>Phone</th>
                <th>Username</th>
                <th>Registered at</th>
                <th>Last Update</th>
                <th>Updated By</th>
                <th>Code</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$count++}}</td>
                        <td>{{$user->name}} <br> {{$user->email}} </td>
                        <td></td>
                        <td></td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                        <td></td>
                        <td></td>
                        <td>@if($user->status==0) Inactive
                            @else Active
                            @endif
                        </td>
                        <td> <a href="{{route('status', ['id'=> $user->id])}}">
                            @if($user->status==0) Approve
                            @else Deactive
                            @endif </a> 
                        </td>

                    </tr>
                    
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    @endsection
</x-dashboard-admin>