@extends('dashboard.layout')

@section('content')
<form action="{{ route('roles.store') }}" method="post">
  @csrf
  <div class="form-group">
    <label for="InputRole">Role</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Ener Role Name" value="{{old('name')}}">
    @error('name')
    <span style="color: red">{{ $message }}</span>
    @endif 
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection