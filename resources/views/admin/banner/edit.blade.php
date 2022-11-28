@extends('admin.layout.index')

@php dump($image) @endphp

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
                        <label class="my-1 mr-2">Belong to Laptop</label>
                        <select class="custom-select my-1 mr-sm-2" name="laptop_id">
                            <option selected value=>Choose...</option>
                            @foreach ($laptop as $array)
                                <option value="{{ $array['id'] }}"
                                    {{ $image['laptop_id'] == $array['id'] ? 'selected' : false }}>
                                    @php $bool = true @endphp
                                    {{ $array['id'] . ' | ' . $array['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Can't change the image itself. You have to delete it</label> <br>
                        <img src={{ $image['name'] }} style="max-height: 200px; max-width: 700px;">
                    </div>
                    <div class="mb-3">
                        @if ($image['url'] != '')
                            <label class="form-label">URL</label>
                            <input class="form-control" name="url" placeholder="https://amogus.png"
                                value="{{ $image['url'] }}">
                        @else
                            <label class="form-label">Doesn't have an outside URL</label>
                            <input class="form-control" type="text" placeholder="{{ $image['name']}}" readonly>
                        @endif
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </form>
        </div>
    </div>
@endsection
