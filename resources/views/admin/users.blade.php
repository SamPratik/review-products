@extends('admin.main')

@section('content')
  <ul class="list-group">
    <h2 class="text-center">USERS</h2>
    @foreach ($users as $user)
      <li class="list-group-item">
        <h4>Name: {{ $user->name }}</h4>
        <strong>Email: {{ $user->email }}</strong><br>
        <strong>Activity Points: {{ $user->activity_pt }}</strong>
      </li>
    @endforeach
  </ul>
@endsection
