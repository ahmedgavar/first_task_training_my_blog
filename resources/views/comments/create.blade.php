
@extends('posts.layout')
@section('form')
<link rel="stylesheet" href="{{url('css/post_create.css') }}"/>


<div id="title">
    <h1 class="display-1">  Comment</h1>
</div>
<form action="{{url('comments')}}"  method="post">
  @csrf

      <div class="input-group mb-3 form_div">
        <label for="post_field"> Post Field</label>
        <input type="text" name="field" class="form-control" readonly
         aria-describedby="basic-addon1" 
         value="1">
        
      </div>
     
        

      <div class="form-floating form_div">
          <label for="content">Content</label>

          <textarea class="form-control" id="content" name="content" style="height: 200px;font-size: x-large;"></textarea>
          
      </div>
      @error('content')
      <div class="alert alert-danger error_messages" role="alert">
        </div>
        @enderror
     

      <button type="submit" id="save_post" class="btn btn-primary">save</button>

      
  </form>
  



@endsection('form')
@section('scripts')

@endsection('scripts')
<!--  
@section('ckeditor')
<script>
    ClassicEditor
        .create( document.querySelector('#content') )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection ('ckeditor')  -->
