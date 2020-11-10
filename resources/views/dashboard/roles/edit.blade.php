@extends('dashboard.layout')

@section('content')
<form action="{{ route('roles.update', $role->id) }}" method="post">
  @method('PATCH') 
  @csrf
  <div class="form-group">
    <label for="InputRole">Role</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Ener Role Name" value="{{ $role->name }}">
    @error('name')
    <span style="color: red">{{ $message }}</span>
    @endif 
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection