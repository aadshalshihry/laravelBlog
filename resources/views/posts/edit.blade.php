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
        

        {{ Form::open(['route' => 'users.store', 'class' => 'form']) }}
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
            {{ Form::submit('Register', 
            array('class' => 'submit_size')) }}
          </div>





        {{ Form::close() }}
      </div>
  </div>
@endsection
