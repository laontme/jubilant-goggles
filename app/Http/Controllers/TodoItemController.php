<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoItemStoreRequest;
use App\Http\Requests\TodoItemUpdateRequest;
use App\Http\Resources\TodoItemCollection;
use App\Http\Resources\TodoItemResource;
use App\Models\TodoItem;
use App\Models\TodoList;
use Illuminate\Http\Request;

class TodoItemController extends Controller
{
    public function index(Request $request)
    {
        $todoItems = auth()->user()->TodoItems()->get();

        if ($request->expectsJson()) {
            return new TodoItemCollection($todoItems);
        }
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

    public function show(TodoItem $todoItem, Request $request)
    {
        if ($request->expectsJson()) {
            return new TodoItemResource($todoItem);
        }
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

    public function destroy(TodoItem $todoItem, Request $request)
    {
        $todoItem->delete();

        if ($request->expectsJson()) {
            return response('', 204);
        }

        return redirect(route('user.dashboard'));
    }
}
