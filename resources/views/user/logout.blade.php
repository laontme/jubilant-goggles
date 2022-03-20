@extends('layout.app')

@section('main')
    <form method="post" action="{{ route('user.logout') }}">
        @csrf
        <h1>Logout</h1>
        <div class="alert alert-danger" role="alert">
            Are you sure you want to log out of your account? <b>All your data will be saved</b>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
