@extends('dashboard.layout')

@section('content')
<form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
    @error('name')
    <span style="color: red">{{ $message }}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
    @error('email')
    <span style="color: red">{{ $message }}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
    @error('password')
    <span style="color: red">{{ $message }}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="name">City</label>
    <input type="text" class="form-control" id="city" name="city" value="{{old('city')}}">
    @error('city')
    <span style="color: red">{{ $message }}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="name">Phone Number</label>
    <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}">
    @error('phone')
    <span style="color: red">{{ $message }}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="country">Select Country</label>
    <select class="form-control" id="country" name="country">
      <option value="">Select country</option>
      @foreach($countries as $country)
      	<option value="{{ $country->id }}" {{ old('country') == $country->id ? 'selected' : '' }}>{{ $country->country_name }}</option>
      @endforeach
    </select>
    @error('country')
    <span style="color: red">{{ $message }}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="role">Select Role</label>
    <select multiple class="form-control" id="role" name="role[]">
      @foreach($roles as $role)
      	<option value="{{ $role->id }}" {{in_array($role->id, old("role") ?: []) ? "selected": ""}}>{{ $role->name }}</option>
      @endforeach
    </select>
    @error('role')
    <span style="color: red">{{ $message }}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="file">Profile Image</label>
    <input type="file" class="form-control-file" id="photo" name="photo">
  @error('photo')
    <span style="color: red">{{ $message }}</span>
    @endif
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection