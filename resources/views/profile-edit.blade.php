@extends('main')

@section('navbar')
  @includeif('partials._navbar')
@endsection

@section('content')
  <div class="" style="padding:50px 0px;">

    <div class="row">
      <div class="col-md-6 offset-md-3">
        @if (session()->has('success'))
          <div class="alert alert-primary" role="alert">
            {{ session('success') }}
          </div>
        @endif
        <h2 class="text-center" style="font-weight:bold;">Edit Profile</h2>
        <form class="" action="{{ route('profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="">Profile Picture:</label>
            <input type="file" name="image">
          </div>
          @if ($errors->has('image'))
            <p style="color:red;font-weight:bold;">{{ $errors->first('image') }}</p>
          @endif
          <div class="form-group">
            <label for="">Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
          </div>
          @if ($errors->has('name'))
            <p style="color:red;font-weight:bold;">{{ $errors->first('name') }}</p>
          @endif
          <div class="form-group">
            <label>About:</label>
            <textarea name="about" rows="5" cols="80" class="form-control">{{ ($errors->has('about')) ? old('about') : $user->about }}</textarea>
          </div>
          @if ($errors->has('about'))
            <p style="color:red;font-weight:bold;">{{ $errors->first('about') }}</p>
          @endif
          <div class="form-group">
            <label for="">Email:</label>
            <input value="{{ $user->email }}" type="text" name="email" class="form-control" id="" placeholder="">
          </div>
          @if ($errors->has('email'))
            <p style="color:red;font-weight:bold;">{{ $errors->first('email') }}</p>
          @endif
          <div class="form-group">
            <label for="">Phone:</label>
            <input value="{{ $user->phone }}" type="text" name="phone" class="form-control" id="" placeholder="">
          </div>
          @if ($errors->has('phone'))
            <p style="color:red;font-weight:bold;">{{ $errors->first('phone') }}</p>
          @endif
          <div class="form-group">
            <label for="">Location:</label>
            <input value="{{ $user->location }}" type="text" name="location" class="form-control" id="" placeholder="">
          </div>
          @if ($errors->has('location'))
            <p style="color:red;font-weight:bold;">{{ $errors->first('location') }}</p>
          @endif
          <div class="form-group">
            <label for="">Religion:</label>
            <select name="religion" class="form-control" id="">
              <option selected disabled>{{ $user->religion }}</option>
              <option {{ $user->religion == "Muslim" ? 'selected' : '' }} value="Muslim">Muslim</option>
              <option {{ $user->religion == "Hindu" ? 'selected' : '' }} value="Hindu">Hindu</option>
              <option {{ $user->religion == "Buddha" ? 'selected' : '' }} value="Buddha">Buddha</option>
              <option {{ $user->religion == "Christian" ? 'selected' : '' }} value="Christian">Christian</option>
            </select>
          </div>
          <div>
            <label style="margin-right:30px;">Gender: </label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="" value="Male" {{ ($user->gender == "Male") ? 'checked' : '' }}>
              <label class="form-check-label" for="">Male</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="" value="Female" {{ ($user->gender == "Female") ? 'checked' : '' }}>
              <label class="form-check-label" for="">Female</label>
            </div>
          </div>
          <div class="form-group text-center">
            <input type="submit" class="btn btn-outline-primary" value="Update">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
