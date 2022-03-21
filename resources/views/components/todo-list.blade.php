<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#acc-{{ $todoList->id }}">
            <span class="me-3 badge rounded-pill bg-warning">{{ $todoList->id }}</span>
            <span>{{ $todoList->title }}</span>
        </button>
    </h2>
    <div id="acc-{{ $todoList->id }}" class="accordion-collapse collapse">
        <div class="accordion-body">
            <ul class="list-group mb-3">
                @foreach($todoList->TodoItems as $todoItem)
                    <x-todo-item :todo-item="$todoItem" has-list-id="true"></x-todo-item>
                @endforeach
            </ul>
            <div class="d-flex gap-2">
                <a class="btn btn-primary" href="{{ route('todo.item.create', ['todoList' => $todoList]) }}">
                    Add new item
                </a>
                <a class="btn btn-warning" href="{{ route('todo.list.edit', ['todoList' => $todoList]) }}">
                    Edit list
                </a>
                @if($hasShowLink)
                    <a class="btn btn-outline-primary" href="{{ route('todo.list.show', ['todoList' => $todoList]) }}">
                        Show list
                    </a>
                @endif
                <form action="{{ route('todo.list.destroy', ['todoList' => $todoList]) }}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-outline-danger" type="submit">Delete list</button>
                </form>
            </div>
        </div>
    </div>
</div>
