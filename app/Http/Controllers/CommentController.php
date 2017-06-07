<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Auth::user();
        // $posts = Post::where('user_id', '=', $user->id)->get();
        // return view("posts.index", compact('posts', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $post_id = $request->post_id;
        return view("comments.create", compact('post_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $post_id = $request->post_id;
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required|max:255'
        ]);

        
        $comment = new Comment;
        $comment->title = strtolower($request->title);
        $comment->body = strtolower($request->body);
        $comment->user_id = $user->id;
        $comment->post_id = $post_id;

        if($comment->save()){
            return redirect()->route("posts.show", $post_id);
        } else {
            return redirect()->route("posts.create");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post_id = $request->post_id;
        $comment_id = $request->comment_id;
        Comment::find($comment_id)->delete();
        return redirect()->route("posts.show", $post_id);
    }
}
