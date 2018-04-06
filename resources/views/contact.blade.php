@extends('main')

@section('navbar')
  @includeif('partials._navbar')
@endsection

@section('content')
  <div class="container" style="padding:50px 0px;">
    <h2 class="text-center">CONTACT US</h2>
    @if (session()->has('success'))
      <div class="alert alert-success col-md-6 offset-md-3" role="alert">
        {{session('success')}}
      </div>
    @endif

    <div class="row">
      <form class="col-md-6 offset-md-3" action="{{route('sendMail')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <input class="form-control" type="text" name="name" value="{{old('name')}}" placeholder="Your Name">
          @if ($errors->has('name'))
              <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group">
          <select class="form-control" name="orgMail" value="{{old('orgMail')}}">
            <option disabled selected>Recipien Email</option>
            <option value="nakibul.alam@northsouth.edu">nakibul.alam@northsouth.edu</option>
            <option value="1330205642@northsouth.edu">1330205642@northsouth.edu</option>
            <option value="asif.ahmed03@northsouth.edu">asif.ahmed03@northsouth.edu</option>
          </select>
          @if ($errors->has('orgMail'))
              <span class="help-block">
                  <strong>{{ $errors->first('orgMail') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group">
          <textarea placeholder="Type your message here..." class="form-control" name="message" rows="5" cols="80">{{old('message')}}</textarea>
          @if ($errors->has('message'))
              <span class="help-block">
                  <strong>{{ $errors->first('message') }}</strong>
              </span>
          @endif
        </div>
        <div class="form-group text-center">
          <input type="submit" class="btn btn-primary" value="Send Mail">
        </div>
      </form>
    </div>
  </div>
@endsection
