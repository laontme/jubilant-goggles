@extends('layout.app')

@section('main')
    <form action="{{ route('todo.list.store') }}" method="post">
        @csrf
        <h1>
            Creating new list
        </h1>
        <div class="mb-3">
            <label class="w-100 form-label">
                Title
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                       placeholder="Catch all pokemons" value="{{ old('title') }}">
                @error('title')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </label>
        </div>

        <div class="mb-4"><code>{{ $errors }}</code></div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
