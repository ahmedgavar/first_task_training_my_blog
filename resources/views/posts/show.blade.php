
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
        <input type="text" name="content"  readonly
         class="form-control"  aria-describedby="basic-addon1"
        value="{!!$my_post->content!!}">



          
    </div>
    
</div>
<!--                               comments               -->

<div style="text-align: center;">
  <h2>
        Comments
    </h2>

    @foreach($comments as $comment)
    <textarea class="form-control" col="40" row="10" id="editor" name="content" 
             style="font-size: x-large;">
    
                {!!$comment->content!!}

        </textarea>


        <span>{{$comment->user->name}}</span>
        <span>
        <a  id="view" href="{{route('comments.edit',['comment'=>$comment->id])}}">edit </a> 
    </span>
        <span><a href="">delete</a></span>




        @endforeach


</div>
      
@endsection('form')

@section('ckeditor')
<script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

@endsection ('ckeditor')  