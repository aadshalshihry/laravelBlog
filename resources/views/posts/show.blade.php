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
            <a href="{{ route("posts.edit", $post->id) }}" class="redirect_btn"><button>Edit</button></a>
          </div>
      </div>
  </div>
@endsection
