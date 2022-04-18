<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    //

    public function index()
    {
        //

     $posts=Post::all();
     return  PostResource::collection($posts);
    
 
    }

    public function show($post)
    {
        //
        $post=Post::find($post);
        
        
         return new PostResource($post);
    }

    public function store(StorePostRequest $request)
    {
        // save image to folder in public

    
            
        $imageName = time().'.'.$request->img_name->extension();  
       
        $request->img_name->move(public_path('assets/api_images'), $imageName);
       
    

        
        
        $post=Post::create([
            'field'=>$request->field,
            'content'=>$request->content,
            
            'user_id'=>$request->user_id,
            'created_by'=>$request->created_by,
            'img_name'=>$imageName,
            



        ]);
        return new PostResource($post);
        




    }


}
