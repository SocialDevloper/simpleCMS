@extends('dashboard.layout')

@section('content')
<form action="{{ route('countries.update', $country->id) }}" method="post">
  @method('PATCH') 
  @csrf
  <div class="form-group">
    <label for="InputRole">Country</label>
    <input type="text" class="form-control" id="country_name" name="country_name" placeholder="Ener Country Name" value="{{ $country->country_name }}">
    @error('country_name')
    <span style="color: red">{{ $message }}</span>
    @endif 
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection