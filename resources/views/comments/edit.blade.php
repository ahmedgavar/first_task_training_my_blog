<link rel="stylesheet" href="{{url('css/post_create.css') }}"/>

@extends('posts.layout')
@section('form')

<div id="title" style="width: 400px;">
    <h1 class="display-1"> Edit Comment </h1>
</div>

<form action="{{route('comments.update',['comment'=>$comment->id])}}" enctype="multipart/form-data" method="post">
  @csrf
  @method('PUT')

<div class="container">
	<div class="sub-container">
		<textarea cols="80" rows="10" id="editor" name="content">

        {!!$comment->content!!}
        </textarea>
	</div>
</div>


<button type="submit" id="save_post" class="btn btn-primary" style="margin-top: 100px;">save</button>

      
</form>
      
@endsection('form')
@section('ckeditor')

<script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

@endsection('ckeditor')
