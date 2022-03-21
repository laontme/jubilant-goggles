@extends('layout.app')

@section('main')
    <h1>{{ $todoList->title }}</h1>
    <div class="accordion mb-2">
        <x-todo-list :todo-list="$todoList" :has-show-link="false"></x-todo-list>
    </div>
@endsection
