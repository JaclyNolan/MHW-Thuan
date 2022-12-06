@extends('admin.layout.index')

@php dump($banner); @endphp

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Banner</h6>
            <a href="{{ asset('admin/banner/create/') }}" type="button" class="btn btn-primary float-right">Create</a>
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
                            <th style="width: 140px;">Actived</th>
                            <th>Preview</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banner as $key => $array)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $array['id'] }}</td>
                                <td>{{ $array['name'] }}</td>
                                <td style="text-align: center">
                                    @if ($array['is_actived'] == true)
                                        <button style="width: 130px" type="button" class="btn btn-success">Actived</button>
                                    @else
                                        <button style="width: 130px" type="button" class="btn btn-danger">Not Actived</button>
                                    @endif
                                </td>
                                <td style="width: 200px">
                                    <img style='max-height: 200px; max-width: 200px;' src='{{ $array['url'] }}'>
                                </td>
                                <td style="width: 160px">
                                    <a href="{{ asset('admin/banner/edit/' . $array['id']) }}"
                                        class="btn btn-primary edit"><span class="glyphicon glyphicon-edit"> </span>
                                        Edit</a>
                                    <a href="{{ asset('admin/banner/delete/' . $array['id']) }}"
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
