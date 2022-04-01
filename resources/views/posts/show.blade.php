<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<div class="container">
<ul class="list-group list-group-flush w-50 ">
  <li class="list-group-item"><strong>Id: </strong> {{$post->id}}</li>
  <li class="list-group-item"><strong>Post Title: </strong>{{$post->title}}</li>
  <li class="list-group-item"><strong>Post Description: </strong>{{$post->body}}</li>
  <li class="list-group-item"><strong>Post created date,time: </strong>{{$post->created_at}}</li>
  <li class="list-group-item"><strong>Post updated date,time: </strong>{{$post->updated_at}}</li>
</ul>

<a class="btn btn-info mt-5" href="/posts">All Posts</a>
</div>