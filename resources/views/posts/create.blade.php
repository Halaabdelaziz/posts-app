<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<div class="container">
<form action="/create" method="post">
  @csrf
  <div class="mb-3">
    <label for="exampleInputTitle" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputTitle">
  </div>
  <div class="mb-3">
    <label for="exampleInputText" class="form-label">Post body</label>
    <textarea type="text" name="body" class="form-control" id="exampleInputText"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>     
</div>