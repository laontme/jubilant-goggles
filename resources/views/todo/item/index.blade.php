@extends('layout.app')

@section('main')
    <h1>All Todo Items</h1>
    <ul class="list-group">
        @foreach($todoItems as $todoItem)
            <x-todo-item :todo-item="$todoItem" has-list-id="true"></x-todo-item>
        @endforeach
    </ul>
@endsection
