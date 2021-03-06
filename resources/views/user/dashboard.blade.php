@extends('layout.app')

@section('main')
    <h1>{{ auth()->user()->name }}</h1>
    <p class="lead">Here is your 5 latest Todo Items</p>
    <ul class="list-group">
        @foreach($todoItems as $todoItem)
            <x-todo-item :todo-item="$todoItem" has-list-id="true"></x-todo-item>
        @endforeach
    </ul>
@endsection
