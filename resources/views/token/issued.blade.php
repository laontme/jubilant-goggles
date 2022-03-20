@extends('layout.app')

@section('main')
    <form action="{{ route("user.settings") }}" method="get">
        @csrf
        <h1>Your new token</h1>
        <p class="lead">We are issued new token for you</p>
        <div class="mb-3">
            <label class="w-100 form-label">
                {{ $comment }}
                <input type="text" class="form-control" name="email" value="{{ $token }}" readonly>
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Return</button>
    </form>
@endsection
