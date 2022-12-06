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
                        <input class="form-control" name="name" placeholder="Vostro 3400" value="{{ $laptop_info->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stock</label>
                        <input class="form-control" name="stock" placeholder="1" value="{{ $laptop_info->stock }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input class="form-control" name="price" placeholder="18000000" value="{{ $laptop_info->price }}">
                    </div>
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" placeholder="Nice laptop, yep." id="description" rows="3"
                            >{{ $laptop_info->description }}</textarea>
                    </div>
                    @foreach ($laptop_specs as $laptop_spec_name => $laptop_spec_array)
                        <div class="mb-3">
                            <label class="my-1 mr-2">{{ ucfirst($laptop_spec_name) }}</label>
                            <select class="custom-select my-1 mr-sm-2" name="{{ $laptop_spec_name }}">
                                <option selected value=>Choose...</option>
                                @if (!empty($laptop_spec_array))
                                    @foreach ($laptop_spec_array as $value)
                                        <option value="{{ $value->id }}"
                                            {{ $laptop_info[$laptop_spec_name . 'ID'] == $value->id ? 'selected' : false }}>
                                            @php $bool = true @endphp
                                            @foreach ($value as $column_name => $column_value)
                                                @if ($bool)
                                                    @if ($column_name != 'id')
                                                        @php $bool = false @endphp
                                                        {{ $column_value }}
                                                    @endif
                                                @else
                                                    {{ '| ' . $column_value }}
                                                @endif
                                            @endforeach
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    @endforeach
                </fieldset>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </form>
        </div>
    </div>
@endsection
