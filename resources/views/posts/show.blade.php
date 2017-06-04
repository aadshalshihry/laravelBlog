@extends('layout')

@section('title', '| Post')

@section('content')
  <div class="content">
    <hr>
      <div class="container">
          <div class="post_card">
            <p><b>Title:</b> <i>{{ $post->title }}</i></p>
            <p class="sub_title">Body</p>
            <div class="post_body">
              {{ $post->body }}
            </div>

            <a href="{{ url()->previous() }}" class="redirect_btn"><button>Back</button></a>

            @if(Auth::user() && Auth::user()->id == $post->user_id)
              <a href="{{ route("posts.edit", $post->id) }}" class="redirect_btn"><button>Edit</button></a>
            @endif
          </div>
      </div>
  </div>
@endsection
