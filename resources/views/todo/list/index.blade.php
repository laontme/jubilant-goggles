@extends('layout.app')

@section('main')
    <h1>All Todo Lists</h1>
    <div class="accordion mb-2">
        @foreach($todoLists as $todoList)
            <x-todo-list :todo-list="$todoList"></x-todo-list>
        @endforeach
    </div>
    <a class="btn btn-primary w-100" href="{{ route('todo.list.create') }}">Create new list</a>
@endsection
