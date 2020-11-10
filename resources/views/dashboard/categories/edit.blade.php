@extends('dashboard.layout')

@section('content')
<form action="{{ route('categories.update', $category->id) }}" method="post">
  @method('PATCH') 
  @csrf
  <div class="form-group">
    <label for="InputRole">Category</label>
    <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Ener Category Name" value="{{ $category->category_name }}">
    @error('category_name')
    <span style="color: red">{{ $message }}</span>
    @endif 
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection