
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<div class="container mt-5">
<a class="btn btn-primary text-light mb-5" href="/create">create post</a>
<table class="table table-hover table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Body</th>
      <th scope="col">Created_at</th>
      <th scope="col">Updated_at</th>
      <th scope="col">User Name</th>
      <th scope="col">User Email</th>
      <th scope="col">User Phone</th>
      
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
            <td>{{$post->user->name}}</td>
            <td>{{$post->user->email}}</td>
            <td>{{$post->user->phone}}</td>
           
    </tr>
        @endforeach

</tbody>

</table>
<a type="submit" class="btn btn-primary" href="/login">Log Out</a>

</div>

