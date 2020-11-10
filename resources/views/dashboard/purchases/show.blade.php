@extends('dashboard.layout')

@section('content')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Purchase Section</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{ route('purchases.create') }}" role="button" class="btn btn-sm btn-outline-secondary">Add New Purchase</a>
          </div>
        </div>
      </div>
    @if($purchase)
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
              <th>Name</th>
              <th>Purchase Product</th>
              <th>Parent Category</th>
              <th>Purchanse Date</th>
              <th>Total Amount</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ 1 }}</td>
              <td>{{ $purchase->user->name }}</td>
              <td>
                @if(!$purchase->products->isEmpty())
                  {{ $purchase->products->implode('product_name', ', ') }}
                @endif
              </td>
              <td>{{ $purchase->category->category_name }}</td>
              <td>{{ date('d-M-Y', strtotime($purchase->purchase_date)) }}</td>
              <td>{{ $purchase->amount }}</td>
              <td>{{ date('d-M-Y h:i A', strtotime($purchase->created_at)) }}</td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                <a role="button" class="btn btn-link" href="{{ route('purchases.edit', $purchase->id) }}" title="Edit Purchase">Edit</a> 
                <form action="{{ route('purchases.destroy', $purchase->id) }}" method="post">
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