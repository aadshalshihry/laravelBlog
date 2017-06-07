@extends('layout')

@section('title', '| User')

@section('content')
  <div class="content">
    <hr>
      <div class="container">
        @foreach ($users as $user)
          <div class="user_card">
            <p>Name: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
            <p>Username: {{ $user->username }}</p>
            @if(Auth::user() && Auth::user()->id == $user->id)
              <a href="{{ route("users.show", $user->id) }}" class="redirect_btn"><button>Show</button></a>
              <a href="{{ route("users.edit", $user->id) }}" class="redirect_btn"><button>Edit</button></a>
              @component('components.deleteBtn', ['route_name' => 'users.destroy' ,'user_id' => $user->id])
              @endcomponent
            @endif
          </div>
        @endforeach
      </div>
  </div>
@endsection
