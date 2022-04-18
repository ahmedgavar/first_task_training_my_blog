
@extends ('posts.layout')

@section('table')
<link rel="stylesheet" href="{{url('css/post_index.css') }}"/>

<div id="link_to_create">
    <a href="{{URL("posts/create")}}" class="link-info">Create Post </a>

</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Posted By</th>
      <th scope="col">Field</th>
      <th scope="col">Content</th>
      <th scope="col" colspan="3" id="operations" > operations </th>
       

      

    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
    <tr class="table-primary">
    
    
      <td>{{$post->id}}</td>
      <td>{{$post->created_by}}</td>

      <td>{{$post->field}}</td>
      <td>{!!$post->content!!}</td>

      


      <td>
        
          <td>
            <a  id="view" href="{{route('posts.show',['post'=>$post->id])}}">view </a> 
          </td>

          <td >
            <a id="edit" href="#"> edit</a> 
          </td> 
          
          <td>
            <a id="delete" href="#"> delete</a> 
          </td>

        
      </td>
      
    </tr>
  </tbody>

    @endforeach
   
</table>
{{$posts->render()}}
@endsection ('table')
