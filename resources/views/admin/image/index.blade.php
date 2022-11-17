@extends('admin.layout.index')

@php dump($image); @endphp

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Laptop</h6>
            <a href="{{ asset('admin/image/create/') }}" type="button" class="btn btn-primary float-right">Create</a>
        </div>
        <div class="col-md-12 bg-light text-right">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 50px">STT</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Laptop</th>
                            <th>Preview</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($image as $key => $array)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $array['id'] }}</td>
                                <td>{{ $array['name'] }}</td>
                                <td>{{ $array['laptop_id'] }}</td>
                                <td style="width:100px">
                                    <img style='max-height: 100px; max-width: 100px;' src='{{ $array['url'] }}'>
                                </td>
                                <td style="width: 160px">
                                    <a href="{{ asset('admin/image/edit/' . $array['id']) }}"
                                        class="btn btn-primary edit"><span class="glyphicon glyphicon-edit"> </span>
                                        Edit</a>
                                    <a href="{{ asset('admin/image/delete/' . $array['id']) }}"
                                        onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-danger"><span
                                            class="glyphicon glyphicon-trash"> </span>Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
