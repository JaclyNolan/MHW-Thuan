@extends('admin.layout.index')

@section('content')
    <div style="margin-left: 20px">
        <h1>Create a new user</h1><br>
        <form action="{{ route('userCreate') }}" method="POST">
            @csrf
            <label for="fullname">Full name</label><br>
            <input type="text" name="fullname" placeholder="Andrew H"><br>
            <label for="username">Username</label><br>
            <input type="text" name="username" placeholder="Username.."><br>
            <label for="password">Password</label><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="submit" value="Create">
        </form>
    </div>
@endsection
