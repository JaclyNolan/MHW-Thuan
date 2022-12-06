@extends('admin.layout.index')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">{{ ucfirst($table_name) }}</h6>
            <a href="{{ asset('admin/simple/create/' . $table_name) }}" type="button"
                class="btn btn-primary float-right">Create</a>
        </div>
        <div class="col-md-12 bg-light text-right">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="width: 50px">STT</th>
                            @foreach ($array[0] as $column_name => $column_value)
                                @php $column_name_tmp = str_replace("_", " ", $column_name) @endphp
                                <th>{{ ucfirst($column_name_tmp) }}</th>
                            @endforeach
                            {{-- <th>Name</th>
                            <th>Price</th>
                            <th>Brand</th>
                            <th>Screen</th>
                            <th>CPU</th>
                            <th>GPU</th>
                            <th>RAM</th>
                            <th>Color</th>
                            <th>SSD</th>
                            <th>HDD</th>
                            <th>Provider</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($array as $index => $collection)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                @foreach ($collection as $column_value)
                                    <td>{{ $column_value }}</td>
                                @endforeach
                                <td style="width: 160px">
                                    <a href="{{ asset('admin/simple/edit/' . $table_name . '/' . $collection['id']) }}"
                                        class="btn btn-primary edit"><span class="glyphicon glyphicon-edit"> </span>
                                        Edit</a>
                                    <a href="{{ asset('admin/simple/delete/' . $table_name . '/' . $collection['id']) }}"
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
