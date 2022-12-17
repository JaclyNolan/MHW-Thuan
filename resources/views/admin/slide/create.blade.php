@extends('admin.layout.index')

@section('content')
<form action="" method="post" style="width:50%" enctype="multipart/form-data">
    @csrf
      <div class="mb-3">
        <label for="slide_name" class="form-label">Name</label>
        <input type="text" class="form-control" id="slide_name" name="slide_name" >
      </div>
      <div class="mb-3">
        <label for="slide_image" class="form-label">Image</label>
        <input type="file" class="form-control" id="slide_image" name="slide_image">
      </div>
      <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection
