<?php

namespace App\View\Components;

use App\Models\TodoList as TodoListModel;
use Illuminate\View\Component;

class TodoList extends Component
{
    public TodoListModel $todoList;
    public bool $hasShowLink;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(TodoListModel $todoList, $hasShowLink = true)
    {
        $this->todoList = $todoList;
        $this->hasShowLink = $hasShowLink;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.todo-list');
    }
}
