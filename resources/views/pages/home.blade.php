@extends('layout')

@section('title', '| Home')

@section('content')
  <div class="content">
    <hr>
    <div class="container">

    {{ $posts->links() }}
    
    @foreach ($posts as $post)
      <div class="post_card">
        <p><b>Title:</b> <i>{{ $post->title }}</i></p>
        <p class="sub_title">Body</p>
        <div class="post_body">
          {{ $post->body }}
        </div>
        <p>
          <h6>By: {{ $post->user->name }}</h6>
        </p>
        
        <a href="{{ route("posts.show", $post->id) }}" class="redirect_btn"><button>Show</button></a>
      </div>
    @endforeach  
    
  </div>
@endsection
