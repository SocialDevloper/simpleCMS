@extends('dashboard.layout')

@section('content')
<form action="{{ route('products.store') }}" method="post">
  @csrf
  <div class="form-group">
    <label for="category">Select Category</label>
    <select class="form-control" id="category" name="category">
      <option value="">Select category</option>
      @foreach($categories as $category)
      	<option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
      @endforeach
    </select>
    @error('category')
    <span style="color: red">{{ $message }}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="InputRole">Product</label>
    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Ener Product Name" value="{{old('product_name')}}">
    @error('product_name')
    <span style="color: red">{{ $message }}</span>
    @endif 
  </div>
    <div class="form-group">
    <label for="InputRole">Price</label>
    <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price Name" value="{{old('price')}}">
    @error('price')
    <span style="color: red">{{ $message }}</span>
    @endif 
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection