@extends('admin.layout.index')



@section('content')
<table class="table" style="width:50%;margin:auto">
    <thead class="table-dark">
    <tr>
          
          <th width="4%">STT</th>
          
          <th width="30%">Name</th>
          
          <th>Image</th>
          
          <th width="20%">Action</th>
          
          </tr>
    </thead>
    <tbody>
    @foreach ($slide as $key => $value)
          
          <tr>
          
          <td>{{ $key+1 }}</td>
          
          <td>{{ $value->slide_name }}</td>
          
         <td><img src="storage/slides/{{$value->slide_image}}" class="img-thumbnail" alt=""></td>
          
          <td>
          
          <a href="{{asset('admin/slide/edit/'.$value->sildeID)}}" class="btn btn-primary edit"><span class="glyphicon glyphicon-edit"> </span> Edit</a>
          
          <a href="{{asset('admin/slide/delete/'.$value->sildeID)}}" onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"> </span>Delete</a>
          
          </td>
          
          </tr>
    </tbody>
          @endforeach
          
          </table>
          <div class="d-flex justify-content-center">
                  {{$slide->links() }}
              </div>
  
@endsection
