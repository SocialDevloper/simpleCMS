@extends('dashboard.layout')

@section('content')
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Product Section</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{ route('products.create') }}" role="button" class="btn btn-sm btn-outline-secondary">Add New Product</a>
          </div>
        </div>
      </div>
    @if(!$products->isEmpty())
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
              <th>Product</th>
              <th>Parent Category</th>
              <th>Price</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php $no = 1; 
            @endphp
            @foreach($products as $product)
            <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $product->product_name }}</td>
              <td>{{ $product->category->category_name }}</td>
              <td>{{ $product->price }}</td>
              <td>{{ date('d-M-Y h:i A', strtotime($product->created_at)) }}</td>
              <td>{{ date('d-M-Y h:i A', strtotime($product->updated_at)) }}</td>
              <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                <a role="button" class="btn btn-link" href="{{ route('products.edit', $product->id) }}" title="Edit Product">Edit</a> 
                <form action="{{ route('products.destroy', $product->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-link">Delete</button>
                </form>
                <a role="button" class="btn btn-link" href="{{ route('products.show', $product->id) }}" title="Show Product">Show</a> </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @else
      <p class="alert alert-info">No Record Found..</p>
      @endif
      {!! $products->links() !!}
@endsection