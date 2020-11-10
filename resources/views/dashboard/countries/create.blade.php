@extends('dashboard.layout')

@section('content')
<form action="{{ route('countries.store') }}" method="post">
  @csrf
  <div class="form-group">
    <label for="InputRole">Country</label>
    <input type="text" class="form-control" id="country_name" name="country_name" placeholder="Ener Country Name" value="{{old('country_name')}}">
    @error('country_name')
    <span style="color: red">{{ $message }}</span>
    @endif 
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection