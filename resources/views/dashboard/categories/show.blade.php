@extends('dashboard.layout')

@section('content')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Category Section</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{ route('categories.create') }}" role="button" class="btn btn-sm btn-outline-secondary">Add New Category</a>
          </div>
        </div>
      </div>
    @if($category)
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Category</th>
              <th>Children</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>{{ $category->category_name }}</td>
              <td> @if(!$category->products->isEmpty())
                  [{{ $category->products->implode('product_name', ', ') }}]
                @endif</td>
              <td>{{ date('d-M-Y h:i A', strtotime($category->created_at)) }}</td>
              <td>{{ date('d-M-Y h:i A', strtotime($category->updated_at)) }}</td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                <a role="button" class="btn btn-link" href="{{ route('categories.edit', $category->id) }}" title="Edit Country">Edit</a> 
                <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-link">Delete</button>
                </form>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      @else
      <p class="alert alert-info">No Record Found..</p>
      @endif
@endsection