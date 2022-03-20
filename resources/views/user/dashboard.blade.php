@extends('layout.app')

@section('main')
    <h1>{{ auth()->user()->name }}</h1>
    <div class="accordion mb-2" id="accordionExample">
        @foreach($todoLists as $todoList)
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse-{{ $todoList->id }}">
                        <span class="me-3 badge rounded-pill bg-primary">{{ $todoList->id }}</span>
                         {{ $todoList->title }}
                    </button>
                </h2>
                <div id="collapse-{{ $todoList->id }}" class="accordion-collapse collapse"
                     data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <ul class="list-group mb-3">
                            @foreach($todoList->TodoItems as $todoItem)
                                <li class="list-group-item">
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center">
                                            <input disabled class="ms-4 me-5 form-check-input" type="checkbox"
                                                   name="done" @checked($todoItem->done)>
                                            <div>
                                                <div>
                                                    <span class="me-1 badge rounded-pill bg-primary">{{ $todoItem->id }}</span>
                                                    {{ $todoItem->title }}
                                                </div>
                                                <p class="mb-0 small">{{ $todoItem->description }}</p>
                                                <a href="{{ route('todo.item.edit', $todoItem) }}">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="d-flex gap-2"><a class="mb-2 btn btn-primary"
                              href="{{ route('todo.item.create', ['todoList' => $todoList]) }}">
                                Add new item
                            </a>
                            <a class="mb-2 btn btn-warning"
                               href="{{ route('todo.list.edit', ['todoList' => $todoList]) }}">
                                Edit list
                            </a>
                            <form class="mb-2" action="{{ route('todo.list.destroy', ['todoList' => $todoList]) }}"
                                  method="post">
                                @method('delete')
                                @csrf

                                <button class="btn btn-outline-danger" type="submit">Delete list</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <a class="btn btn-primary w-100 mb-5" href="{{ route('todo.list.create') }}">Create new list</a>
@endsection
