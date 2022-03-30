<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Body</th>
      <th scope="col">Created_at</th>
      <th scope="col">Updated_at</th>
      <th scope="col">Edit</th>
      <th scope="col">Show</th>
      <th scope="col">Delete</th>
    </tr>
</thead>
<tbody>
       @foreach($posts as $post)
    <tr> 
            <td>{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->created_at}}</td>
            <td>{{$post->updated_at}}</td>
            <td><a class="btn  btn-info" href="/posts/{{$post['id']}}">Show</a></td>
            <td><a class="btn btn-warning" href="/posts/{{$post['id']}}/edit">Edit</a></td>
           <td>
           <form action="/posts/{{$post->id}}" method="post">
              @csrf
              @method("DELETE")
                <input class=" btn btn-danger" type="submit" name="Delete" value="delete">
            </form>
           </td>
    </tr>
        @endforeach
</tbody>
</table>