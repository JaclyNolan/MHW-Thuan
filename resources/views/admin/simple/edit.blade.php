@extends('admin.layout.index')

@php dump($array) @endphp

@section('content')
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ ucfirst($table_name) }}</h6>
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
                    @foreach ($array as $column_name => $column_value)
                        @if ($column_name != 'id')
                            @php $column_name_tmp = str_replace("_", " ", $column_name) @endphp
                            <div class="mb-3">
                                <label class="form-label">{{ ucfirst($column_name_tmp) }}</label>
                                <input class="form-control" name="{{ $column_name }}"
                                    placeholder="{{ ucfirst($column_name_tmp) }}" value="{{ $column_value }}">
                            </div>
                        @endif
                    @endforeach
                </fieldset>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </form>
        </div>
    </div>
@endsection
