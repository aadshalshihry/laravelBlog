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

@section('title', '| Add New User')

@section('content')
  <div class="content">
    <hr>
      <div class="container">
        <h3>Edit Profile... </h3>
        
        <div class="errors">
          @if ($errors)
          {{ $errors->first() }}
        @endif
        </div>

        {{-- <form action="{{ route('users.store') }}" method="POST" class="form">
          

          {{ csrf_field() }}
          {{ method_field('PATCH') }}

          <div class="form_control">
            <label for="name">Name:</label>
            <input type="text" name="name" 
              class="input_size" value="{{ $user->name }}" placeholder="Enter your name">
          </div>

          <div class="form_control">
            <label for="email">Email:</label>
            <input type="email" name="email" 
              class="input_size" value="{{ $user->email }}" placeholder="Enter your email">
          </div>

          <div class="form_control">
            <label for="username">Username:</label>
            <input type="username" name="username" 
              class="input_size" value="{{ $user->username }}" placeholder="Enter your username">
          </div>

          <div class="form_control">
            <label for="old_password">Old Password:</label>
            <input type="old_password" name="old_password" 
              class="input_size" value="" placeholder="Enter your old_password">
          </div>

          <div class="form_control">
            <label for="password">Password:</label>
            <input type="password" name="password" 
              class="input_size" value="" placeholder="Enter your password">
          </div>

          <div class="form_control">
            <label for="password_confirmation">Password Confirmation:</label>
            <input type="password_confirmation" name="password_confirmation" 
              class="input_size" value="" placeholder="Enter your password_confirmation">
          </div>

          <div class="form_control">
            <input type="submit" name="submit" class="submit_size" value="Update User">
            
          </div>

        </form> --}}
        

        {{ Form::open(['route' => ['users.update', $user->id], 'class' => 'form']) }}
          {{ method_field('PATCH') }}

          {{-- {{ csrf_field() }} --}}

          <div class="form_control">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', $user->name, 
            array('placeholder' => 'Enter your name', 'class' => 'input_size')) }}
          </div>

          <div class="form_control">
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', $user->email, 
            array('placeholder' => 'Enter your email','class' => 'input_size')) }}
          </div>

          <div class="form_control">
            {{ Form::label('username', 'Username:') }}
            {{ Form::text('username', $user->username, 
            array('placeholder' => 'Enter your username','class' => 'input_size')) }}
          </div>

          <div class="form_control">
            {{ Form::label('old_password', 'Old password:') }}
            {{ Form::password('old_password', 
            array('placeholder' => 'Enter your old password','class' => 'input_size')) }}
          </div>

          <div class="form_control">
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password', 
            array('placeholder' => 'Enter your password','class' => 'input_size')) }}
          </div>

          <div class="form_control">
            {{ Form::label('confirm_password', 'Confirm Password:') }}
            {{ Form::password('password_confirmation', 
            array('placeholder' => 'confirm your password','class' => 'input_size')) }}
          </div>

          <div class="form_control">
            {{ Form::submit('Update User', 
            array('class' => 'submit_size')) }}
          </div>

        {{ Form::close() }}

      </div>
  </div>
@endsection
