@extends('layout.app')

@section('main')
    <form class="mb-3" action="{{ route('todo.list.update', $todoList) }}" method="post">
        @method('patch')
        @csrf
        <h1>
            {{ $todoList->title }}
        </h1>
        <div class="mb-3">
            <label class="w-100 form-label">
                Title
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                       placeholder="Catch all pokemons" value="{{ old('title', $todoList->title) }}">
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
