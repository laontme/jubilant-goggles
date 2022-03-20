@extends('layout.app')

@section('main')
    <form method="post" action="{{ route('user.login') }}">
        @csrf
        <h1>Login</h1>
        <div class="mb-3">
            <label class="w-100 form-label">
                Email address
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                       placeholder="name@example.com" value="{{ old('email') }}">
                @error('email')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </label>
        </div>
        <div class="mb-3">
            <label class="w-100 form-label">
                Password
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                @error('password')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </label>
        </div>
        <div class="mb-3 form-check">
            <label class="form-check-label">
                Remember me
                <input type="checkbox" class="form-check-input" name="remember">
            </label>
        </div>

        <div class="mb-4"><code>{{ $errors }}</code></div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
