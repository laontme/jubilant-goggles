@extends('layout.app')

@section('main')
    <h1>{{ $todoItem->title }}</h1>
    <ul class="list-group">
        <x-todo-item :todo-item="$todoItem" :has-list-id="true" :has-show-link="false"></x-todo-item>
    </ul>
@endsection
