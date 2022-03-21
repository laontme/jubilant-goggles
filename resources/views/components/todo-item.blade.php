<li class="list-group-item">
    <div class="d-flex">
        <div class="d-flex align-items-center">
            <input disabled class="p-3 me-3 form-check-input" type="checkbox" name="done" @checked($todoItem->done)>
            <div>
                <div>
                    @if($hasListId)
                        <span class="me-1 badge rounded-pill bg-warning">{{ $todoItem->list_id }}</span>
                    @endif
                    <span class="me-1 badge rounded-pill bg-primary">{{ $todoItem->id }}</span>
                    {{ $todoItem->title }}
                </div>
                <p class="mb-0 small">{{ $todoItem->description }}</p>
                <a href="{{ route('todo.item.edit', $todoItem) }}">Edit</a>
                @if($hasShowLink)
                    <a href="{{ route('todo.item.show', $todoItem) }}">Show</a>
                @endif
            </div>
        </div>
    </div>
</li>
