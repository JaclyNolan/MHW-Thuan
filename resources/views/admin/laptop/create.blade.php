@extends('admin.layout.index')

@section('content')
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laptop</h6>
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
            <form action="" method="post">
                @csrf
                <fieldset class="form-group">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input class="form-control" name="name" placeholder="Vostro 3400" value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input class="form-control" name="price" placeholder="18000000" value="{{ old('price') }}">
                    </div>
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" placeholder="Nice laptop, yep." id="description" rows="3"
                            value="{{ old('description') }}"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="my-1 mr-2">Brand</label>
                        <select class="custom-select my-1 mr-sm-2" name="brand">
                            <option selected value="None">Choose...</option>
                            @if (!empty($brand))
                                @foreach ($brand as $item)
                                    <option value="{{ $item->bID }}" {{old('brand') == $item->bID?'select':true}} >{{$item->bName}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="my-1 mr-2">Screen Size</label>
                        <select class="custom-select my-1 mr-sm-2" name="brand">
                            <option selected value="None">Choose...</option>
                            @if (!empty($screensize))
                                @foreach ($screensize as $item)
                                    <option value="{{ $item->sID }}" {{old('screensize') == $item->sID?'select':true}} >{{$item->sSize}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input class="form-control" name="phone_number" placeholder="0987654321"
                            value="{{ old('phone_number') }}" type="number">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <div class="form-control">
                            <input class="form-check-input" id="male" name="gender" type="radio" <?php if (old('gender') == 0 and old('gender') != null) {
                                echo 'checked';
                            } ?>
                                value=0>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-control">
                            <input class="form-check-input" id="female" name="gender" type="radio" <?php if (old('gender') == 1) {
                                echo 'checked';
                            } ?>
                                value=1>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </form>
        </div>
    </div>
@endsection
