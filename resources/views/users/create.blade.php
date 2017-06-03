@extends('layout')

@section('title', '| Add New User')

@section('content')
  <div class="content">
    <hr>
      <div class="container">
        <h3>Register... </h3>
        
        <div class="errors">
          @if ($errors)
          {{ $errors->first() }}
        @endif
        </div>
        

        {{ Form::open(['route' => 'users.store']) }}
          <div class="form_control">
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name', null, 
            array('placeholder' => 'Enter your name','class' => 'input_size')) }}
          </div>

          <div class="form_control">
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email', null, 
            array('placeholder' => 'Enter your email','class' => 'input_size')) }}
          </div>

          <div class="form_control">
            {{ Form::label('username', 'Username:') }}
            {{ Form::text('username', null, 
            array('placeholder' => 'Enter your username','class' => 'input_size')) }}
          </div>

          <div class="form_control">
            {{ Form::label('password', 'password:') }}
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
