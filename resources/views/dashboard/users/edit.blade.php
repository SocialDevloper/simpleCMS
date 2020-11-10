@extends('dashboard.layout')

@section('content')
<form action="{{ route('users.update', $user->id ) }}" method="post" enctype="multipart/form-data">
  @csrf
  @method("PUT")
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
    @error('name')
    <span style="color: red">{{ $message }}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
    @error('email')
    <span style="color: red">{{ $message }}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="name">City</label>
    <input type="text" class="form-control" id="city" name="city" value="{{ $user->profile->city }}">
    @error('city')
    <span style="color: red">{{ $message }}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="name">Phone Number</label>
    <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->profile->phone }}">
    @error('phone')
    <span style="color: red">{{ $message }}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="country">Select Country</label>
    <select class="form-control" id="country" name="country">
      <option value="">Select country</option>
      @foreach($countries as $country)
        <option value="{{ $country->id }}" {{ $user->profile->country->id == $country->id ? 'selected' : '' }}>{{ $country->country_name }}</option>
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
        <option value="{{ $role->id }}" {{in_array($role->id, $user->roles->pluck('id')->toArray() ?: []) ? "selected": ""}}>{{ $role->name }}</option>
      @endforeach
    </select>
    @error('role')
    <span style="color: red">{{ $message }}</span>
    @endif
  </div>
  <div class="form-group">
    <img src="{{ asset('storage/'.$user->profile->photo) }}" alt="" class="img-fluid img-thumbnail" width="100" height="100" /><br>
    <label for="file">Profile Image</label>
    <input type="file" class="form-control-file" id="photo" name="photo">
  @error('photo')
    <span style="color: red">{{ $message }}</span>
    @endif
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection