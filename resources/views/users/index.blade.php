@extends('layout')

@section('title', '| User')

@section('content')
  <div class="content">
    <p>Users</p>
    <hr>
      <div class="container">
        @foreach ($users as $user)
          <div class="user_card">
            <p>Name: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
            <p>Username: {{ $user->username }}</p>
          </div>
        @endforeach
      </div>
  </div>
@endsection
