@extends('admin.layout.index')

@section('content')
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Admin</h6>
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
                        <label class="form-label">Fullname</label>
                        <input class="form-control" name="fullname" placeholder="Nguyễn Văn A"
                            value="{{ old('fullname') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input class="form-control" name="email" placeholder="example@email.com"
                            value="{{ old('email') }}" type="email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control" name="password" placeholder="Password" type="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input class="form-control" name="password_confirmation" placeholder="Confirm Password"
                            type="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input class="form-control" name="phone_number" placeholder="0987654321"
                            value="{{ old('phone_number') }}" type="number">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <div class="form-control">
                            <input class="form-check-input" id="male" name="gender" type="radio"
                                <?php if (old('gender') == 0 and old('gender') != null) {
                                    echo 'checked';
                                } ?> value=0>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-control">
                            <input class="form-check-input" id="female" name="gender" type="radio"
                                <?php if (old('gender') == 1) {
                                    echo 'checked';
                                } ?> value=1>
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
