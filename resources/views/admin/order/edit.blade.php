@extends('admin.layout.index')

@php dump($order) @endphp

@section('content')
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Image</h6>
    </div>
    <div class="card-body">
        <?php
        if ($errors->all()) {
            echo '<div class="alert alert-danger" role="alert">';
            foreach ($errors->all() as $message) {
                echo $message . '<br>';
            }
            echo '</div>';
        }
        ?>
        <div class="table-responsive">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <fieldset class="form-group">
                    <div class="mb-3">
                        <label class="my-1 mr-2">The laptop belongs to this order</label>
                        <select class="custom-select my-1 mr-sm-2" name="laptop_id">
                            <option selected value=>Choose...</option>
                            @foreach ($laptop as $array)
                                <option value="{{ $array['id'] }}"
                                    {{ $order['laptop_id'] == $array['id'] ? 'selected' : false }}>
                                    @php $bool = true @endphp
                                    {{ $array['id'] . ' | ' . $array['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Customer Name</label>
                        <input class="form-control" name="customer_name" placeholder="Nguyễn Văn A"
                            value="{{ $order['customer_name'] }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Customer Address</label>
                        <input class="form-control" name="customer_address" placeholder="Hà Nội"
                            value="{{ $order['customer_address'] }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Customer Phonenumber</label>
                        <input class="form-control" name="customer_phonenumber" placeholder="0987654321"
                            value="{{ $order['customer_phonenumber'] }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Laptop's price</label>
                        <input class="form-control" name="old_price" placeholder="18000000"
                            value="{{ $order['old_price'] }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quanity</label>
                        <input class="form-control" name="quanity" placeholder="1"
                            value="{{ $order['quanity'] }}">
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </form>
        </div>
    </div>
@endsection
