@extends('layout')

@section('title', '| User')

@section('content')
  <div class="content">
    <hr>
      <div class="container">

        <a href="{{ route("posts.create") }}"><button>Create New Post</button></a>
        @foreach ($posts as $post)
          <div class="post_card">
            <p><b>Title:</b> <i>{{ $post->title }}</i></p>
            <p class="sub_title">Body</p>
            <div class="post_body">
              {{ $post->body }}
            </div>
            <p>
              <h6>By: {{ $user->name }}</h6>
            </p>
            
            <a href="{{ route("posts.show", $post->id) }}" class="redirect_btn"><button>Show</button></a>
            <a href="{{ route("posts.edit", $post->id) }}" class="redirect_btn"><button>Edit</button></a>
            @component('components.deleteBtn', ['route_name' => 'posts.destroy' ,'user_id' => $post->id])
            @endcomponent
          </div>
        @endforeach
      </div>
  </div>
@endsection
