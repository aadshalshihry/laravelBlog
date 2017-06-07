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
        

          {{ Form::open(['route' => ['posts.update', $post->id ], 'class' => 'form']) }}
            {{ method_field('PATCH') }}

          <div class="form_control">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', $post->title, 
            array('placeholder' => 'Enter your title','class' => 'input_size')) }}
          </div>

          <div class="form_control">
            {{ Form::label('body', 'Body:') }}
            {{ Form::textarea('body', $post->body, 
            array('placeholder' => 'Enter your body','class' => 'input_size')) }}
          </div>


          <div class="form_control">
            {{ Form::submit('Update Post', 
            array('class' => 'submit_size')) }}
          </div>

        {{ Form::close() }}
      </div>
  </div>
@endsection
