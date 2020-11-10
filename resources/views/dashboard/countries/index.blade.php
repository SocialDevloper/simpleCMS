@extends('dashboard.layout')

@section('content')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Country Section</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{ route('countries.create') }}" role="button" class="btn btn-sm btn-outline-secondary">Add New Country</a>
          </div>
        </div>
      </div>
    @if(!$countries->isEmpty())
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
              <th>Country</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php
            $no = $countries->firstItem();
            @endphp
            @foreach($countries as $country)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $country->country_name }}</td>
              <td>{{ date('d-M-Y h:i A', strtotime($country->created_at)) }}</td>
              <td>{{ date('d-M-Y h:i A', strtotime($country->updated_at)) }}</td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                <a role="button" class="btn btn-link" href="{{ route('countries.edit', $country->id) }}" title="Edit Country">Edit</a> 
                <form action="{{ route('countries.destroy', $country->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-link">Delete</button>
                </form>
                <a role="button" class="btn btn-link" href="{{ route('countries.show', $country->id) }}" title="Show Country">Show</a> </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @else
      <p class="alert alert-info">No Record Found..</p>
      @endif
      {!! $countries->links() !!}
@endsection