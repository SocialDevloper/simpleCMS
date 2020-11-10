@extends('dashboard.layout')

@section('content')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">User Section</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{ route('users.create') }}" role="button" class="btn btn-sm btn-outline-secondary">Add New User</a>
          </div>
        </div>
      </div>
    @if($user)
     @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $message }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Avtar</th>
              <th>Name</th>
              <th>Email</th>
              <th>City</th>
              <th>Phone</th>
              <th>Country</th>
              <th>Roles</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ ++$i }}</td>
              <td><img src="{{ asset('storage/'.$user->profile->photo)}}" alt="Image" width="50" height="50" /></td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->profile->city }}</td>
              <td>{{ $user->profile->phone }}</td>
              <td>{{ $user->profile->country->country_name }}</td>
              <td>
                @if(!$user->roles->isEmpty())
                  {{ $user->roles->implode('name', ', ') }}
                @endif
              </td>
              <td>{{ date('d-M-Y h:i A', strtotime($user->created_at)) }}</td>
              <td>{{ date('d-M-Y h:i A', strtotime($user->updated_at)) }}</td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                <a role="button" class="btn btn-link" href="{{ route('users.edit', $user->id) }}" title="Edit User">Edit</a> 
                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-link">Delete</button>
                </form>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      @else
      <p class="alert alert-info">No Record Found..</p>
      @endif
@endsection