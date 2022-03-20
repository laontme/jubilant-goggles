@extends('layout.app')

@section('main')
    <form class="mb-3" action="{{ route('todo.item.update', $todoItem) }}" method="post">
        @method('patch')
        @csrf
        <h1>
            {{ $todoItem->title }}
        </h1>
        <div class="mb-3">
            <label class="w-100 form-label">
                Title
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                       placeholder="Catch all pokemons" value="{{ old('title', $todoItem->title) }}">
                @error('title')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </label>
        </div>
        <div class="mb-3">
            <label class="w-100 form-label">
                Description
                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                    placeholder="Catch all pokemons on the Earth" value="{{ old('description', $todoItem->description) }}">
                @error('description')
                <span class="invalid-feedback">
                    {{ $message }}
                </span>
                @enderror
            </label>
        </div>
        <div class="mb-3 form-check">
            <label class="form-check-label">
                Done
                <input type="checkbox" class="form-check-input" name="done" @checked(old('done', $todoItem->done))>
            </label>
        </div>

        <div class="mb-4"><code>{{ $errors }}</code></div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <form action="{{ route('todo.item.destroy', ['todoItem' => $todoItem]) }}" method="post">
        @method('delete')
        @csrf
        <button class="btn btn-outline-danger" type="submit">Delete</button>
    </form>
@endsection
