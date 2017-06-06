@if(is_object(Auth::user()))
  @if(Auth::user()->id != $user->id)
    <script type="text/javascript">
      window.location = "{{ route('users.index') }}";
    </script>
  @endif
@else 
  <script type="text/javascript">
    window.location = "{{ route('users.index') }}";
  </script>
@endif

@extends('layout')

@section('title', '| User')

@section('content')
  <div class="content">
    <hr>
      <div class="container">
          <div class="user_card">
            <p>Name: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
            <p>Username: {{ $user->username }}</p>
            <a href="{{ url()->previous() }}" class="redirect_btn"><button>Back</button></a>
            <a href="{{ route("users.edit", $user->id) }}" class="redirect_btn"><button>Edit</button></a>
            
          </div>
      </div>
  </div>
@endsection
