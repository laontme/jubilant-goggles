<?php

namespace App\View\Components;

use App\Models\TodoItem as TodoItemModel;
use Illuminate\View\Component;

class TodoItem extends Component
{
    public TodoItemModel $todoItem;
    public bool $hasListId;
    public bool $hasShowLink;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(TodoItemModel $todoItem, $hasListId = false, $hasShowLink = true)
    {
        $this->todoItem = $todoItem;
        $this->hasListId = $hasListId;
        $this->hasShowLink = $hasShowLink;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.todo-item');
    }
}
