@extends('admin.layout.index')

@php dump($order); @endphp

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary float-left">Image</h6>
                <a href="{{ asset('admin/order/create/') }}" type="button" class="btn btn-primary float-right">Create</a>
            </div>
            <div class="col-md-12 bg-light text-right">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th rowspan="2" style="width: 50px">STT</th>
                                <th rowspan="2">ID</th>
                                <th colspan="3" style="text-align: center">Customer</th>
                                <th colspan="3" style="text-align: center">Laptop</th>
                                <th rowspan="2">Total</th>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phonenumber</th>
                                <th>ID</th>
                                <th>Old Price</th>
                                <th>Quanity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $key => $array)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $array['id'] }}</td>
                                    <td>{{ $array['customer_name'] }}</td>
                                    <td>{{ $array['customer_address'] }}</td>
                                    <td>{{ $array['customer_phonenumber'] }}</td>
                                    <td>{{ $array['laptop_id'] }}</td>
                                    <td>{{ $array['old_price'] }}</td>
                                    <td>{{ $array['quanity'] }}</td>
                                    <td>{{ $array['total'] }}</td>
                                    <td style="width: 160px">
                                        <a href="{{ asset('admin/order/edit/' . $array['id']) }}"
                                            class="btn btn-primary edit"><span class="glyphicon glyphicon-edit"> </span>
                                            Edit</a>
                                        <a href="{{ asset('admin/order/delete/' . $array['id']) }}"
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
