@extends('dashboard.layout')

@section('content')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Role Section</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{ route('roles.create') }}" role="button" class="btn btn-sm btn-outline-secondary">Add New Role</a>
          </div>
        </div>
      </div>
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
              <th>Role</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php $no = 1; 
            @endphp
            <tr>
              <td>{{ $no }}</td>
              <td>{{ $role->name }}</td>
              <td>{{ date('d-M-Y h:i A', strtotime($role->created_at)) }}</td>
              <td>{{ date('d-M-Y h:i A', strtotime($role->updated_at)) }}</td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                <a role="button" class="btn btn-link" href="{{ route('roles.edit', $role->id) }}" title="Edit Role">Edit</a> 
                <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-link">Delete</button>
                </form>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      {{-- @else
      <p class="alert alert-info">No Record Found..</p>
      @endif
      {!! $roles->links() !!} --}}
@endsection