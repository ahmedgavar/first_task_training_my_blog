
@extends('posts.layout')
@section('form')
<link rel="stylesheet" href="{{url('css/post_create.css') }}"/>

<div style="text-align: center;">


    <div style="text-align: center;">
        <img src="{{ URL::asset('assets/images/'.$my_post->img_name ) }}" alt="" style="width: 70%;height: 70%;">
      
    </div>

    <div class="input-group mb-3 form_div" style="margin-top: 50px;">
        <label for="post_field"> Post Field</label>
        <input type="text" name="field"  readonly
         class="form-control"  aria-describedby="basic-addon1"
        value="{{$my_post->field}}">
     
     
        
    </div>
      
        
    <div class="form-floating form_div">
        <label for="content">Content</label>

        <textarea class="form-control" id="content" name="content" 
            readonly style="height: 200px;font-size: x-large;">
    
                {{$my_post->content}}

        </textarea>
          
    </div>
    
</div>
<!--                               comments               -->

<div style="text-align: center;">
  <h2>
        Comments
    </h2>
    <!-- <a  id="view" href="{{route('comments.create')}}">Add comment </a>  -->

    @foreach($comments as $comment)

    <input type="text" name="field"  readonly
         class="form-control"  aria-describedby="basic-addon1"
        value="{{$comment->content}}">
        <span>{{$comment->user->name}}</span>

        @endforeach


</div>
      
@endsection('form')

