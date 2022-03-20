<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoItemStoreRequest;
use App\Http\Requests\TodoItemUpdateRequest;
use App\Models\TodoItem;
use App\Models\TodoList;
use Illuminate\Http\Request;

class TodoItemController extends Controller
{
    public function index()
    {
    }

    public function create(Request $request)
    {
        $todoList = TodoList::find($request->query('todoList'));
        return response()->view('todo.item.create', compact('todoList'));
    }

    public function store(TodoItemStoreRequest $request)
    {
        $todoList = TodoList::find($request->query('todoList'));
        $todoItem = new TodoItem($request->validated());
        $todoList->TodoItems()->save($todoItem);
        return redirect(route('user.dashboard'));
    }

    public function show(TodoItem $todoItem)
    {
    }

    public function edit(TodoItem $todoItem)
    {
        return response()->view('todo.item.edit', compact('todoItem'));
    }

    public function update(TodoItemUpdateRequest $request, TodoItem $todoItem)
    {
        $todoItem->update($request->validated());
        return redirect()->back();
    }
    
    public function destroy(TodoItem $todoItem)
    {
        $todoItem->delete();
        return redirect(route('user.dashboard'));
    }
}
