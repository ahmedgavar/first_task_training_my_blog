
@extends('posts.layout')
@section('form')
<link rel="stylesheet" href="{{url('css/post_create.css') }}"/>



<div id="title">
    <h1 class="display-1"> New Post</h1>
</div>
<form action="{{route('posts.store')}}" enctype="multipart/form-data" method="post">
  @csrf

  <div class="input-group mb-3 form_div">
        <label for="post_field"> Post Field</label>
        <input type="text" name="field" class="form-control"  aria-describedby="basic-addon1">
        
      </div>
      @error('field')
      <div class="alert alert-danger error_messages" role="alert">
            {{$message}}
        </div>
        @enderror
        
     
      <div id="post_content">
        <label for="content">Content</label>

        <textarea class="form-control" id="editor" name="content" >

        </textarea>
      </div>
      
          
          
      
      @error('content')
      <div class="alert alert-danger error_messages" role="alert">
            {{$errors->first('content')}}
        </div>
        @enderror
      
      <div>
              <label for="image">upload image:</label>
              <input type="file" id="img" name="img_name" accept="image/*" >
      </div>
      @error('img_name')
      <div class="alert alert-danger error_messages" role="alert">
            {{$errors->first('img_name')}}
        </div>
        @enderror

      <button type="submit" id="save_post" class="btn btn-primary">save</button>

      
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

@endsection ('ckeditor')  