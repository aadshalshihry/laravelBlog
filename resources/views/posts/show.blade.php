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
            <p>
              <h6>By: {{ $user->name }}</h6>
            </p>
              @foreach($post->comments as $comment)
                <div class="comment_card">
                  <h6>Title: {{ $comment->title }}</h6>
                  <p>{{ $comment->body }}</p>
                  <h6>By: {{ $comment->user->name }}</h6>
                  {{ Form::open(['route' => ['comment.destroy', $comment->post->id, $comment->id]])}}
                    {{ method_field('DELETE') }}
                    {{ Form::submit("Delete Comment")}}
                  {{ Form::close()}}
                 {{--  <a href="{{ url("posts/" . $comment->post->id . "/comments/$comment->id")}}" class="redirect_btn"><button>Delete Comment!</button> --}}
                </div>

              @endforeach

            <a href="{{ url()->previous() }}" class="redirect_btn"><button>Back</button></a>

            @if(Auth::user() && Auth::user()->id == $post->user_id)
              <a href="{{ route("posts.edit", $post->id) }}" class="redirect_btn"><button>Edit</button></a>
              @component('components.deleteBtn', ['route_name' => 'posts.destroy' ,'user_id' => $post->id])
              @endcomponent
              <a href="{{ route("comment.create", $post->id) }}" class="redirect_btn"><button>Add Comment</button>
            @endif
          </div>
      </div>
  </div>
@endsection
