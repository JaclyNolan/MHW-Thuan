@extends('front_end.layouts.index')

@section('content')
    <div class="container">
        @if ($message = Session::get('failure'))
            <div class="alert alert-danger alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <?php
        if ($errors->all()) {
            echo '<div class="alert alert-danger" role="alert">';
            foreach ($errors->all() as $message) {
                echo $message . '<br>';
            }
            echo '</div>';
        }
        ?>
        <div class="col-lg-6 col-md-6 m-4">
            <div class="table-responsive">
                <form action="" method="post">
                    @csrf
                    <fieldset class="form-group">
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input class="form-control" name="customer_phonenumber" placeholder="0987654321"
                                value="{{ old('customer_phonenumber') }}">
                        </div>
                    </fieldset>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
