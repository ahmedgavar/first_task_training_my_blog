<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\StorePostRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $post=Post::find($id);
       
        return view('comments.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        //

        $comment=Comment::create([
            
            'content'=>$request->content,
            
            'user_id'=>$request->user()->id,
            'post_id'=>1
            
            
        ]);


        // $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
        $comment_creator=$comment->user_id;


        $user = auth()->user()->id;

        
        return view('comments.edit',['comment'=>$comment,'user'=>$user]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCommentRequest $request, Comment $comment)
    {
        //
        $comment->content=$request->content;
        $comment->user_id=$request->user()->id;
        $comment-> post_id =1;
        $comment->update();
        return redirect()->route('posts.show', ['post' => $comment->post_id])->with('status','data is updated succefully');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
