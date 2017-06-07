@extends('layout')

@section('title', '| Add New Comment')

@section('content')
  <div class="content">
    <hr>
      <div class="container">
        <h3>Create New Comment For Post</h3>
        
        <div class="errors">
          @if ($errors)
          {{ $errors->first() }}
        @endif
        </div>
        

        {{ Form::open(['route' => ['comment.store', $post_id], 'class' => 'form']) }}
          <div class="form_control">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, 
            array('placeholder' => 'Enter the title for the comment','class' => 'input_size')) }}
          </div>

          <div class="form_control">
            {{ Form::label('body', 'Body:') }}
            {{ Form::textarea('body', null, 
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
