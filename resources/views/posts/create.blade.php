@extends('layout')

@section('title', '| Add New Post')

@section('content')
  <div class="content">
    <hr>
      <div class="container">
        <h3>Create New Post</h3>
        
        <div class="errors">
          @if ($errors)
          {{ $errors->first() }}
        @endif
        </div>
        

        {{ Form::open(['route' => 'posts.store', 'class' => 'form']) }}
          <div class="form_control">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, 
            array('placeholder' => 'Enter your title','class' => 'input_size')) }}
          </div>

          <div class="form_control">
            {{ Form::label('body', 'Body:') }}
            {{ Form::text('body', null, 
            array('placeholder' => 'Enter your body','class' => 'input_size')) }}
          </div>


          <div class="form_control">
            {{ Form::submit('Create Post', 
            array('class' => 'submit_size')) }}
          </div>

        {{ Form::close() }}
      </div>
  </div>
@endsection
