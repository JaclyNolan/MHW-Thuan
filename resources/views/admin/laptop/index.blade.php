@extends('admin.layout.index')

@php dump($laptop); @endphp

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Laptop</h6>
            <a href="{{ asset('admin/laptop/create/') }}" type="button" class="btn btn-primary float-right">Create</a>
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
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Brand</th>
                            <th>Screen</th>
                            <th>CPU</th>
                            <th>GPU</th>
                            <th>RAM</th>
                            <th>Color</th>
                            <th>SSD</th>
                            <th>HDD</th>
                            <th>Provider</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laptop as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->laptopID }}</td>
                                <td>{{ $value->laptopName }}</td>
                                <td>{{ $value->laptopStock }}</td>
                                <td>{{ $value->laptopPrice }}</td>
                                <td>{{ $value->brandName }}</td>
                                <td>{{ $value->screenSize }}</td>
                                <td>{{ $value->processorName }}</td>
                                <td>{{ $value->vgaName }}</td>
                                <td>{{ $value->ramSize }}</td>
                                <td>{{ $value->colorName }}</td>
                                <td>{{ $value->ssdSize }}</td>
                                <td>{{ $value->hddSize }}</td>
                                <td>{{ $value->providerName }}</td>
                                <td style="width: 160px">
                                    <a href="{{ asset('admin/laptop/edit/' . $value->laptopID) }}"
                                        class="btn btn-primary edit"><span class="glyphicon glyphicon-edit"> </span>
                                        Edit</a>
                                    <a href="{{ asset('admin/laptop/delete/' . $value->laptopID) }}"
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
