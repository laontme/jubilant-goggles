<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoListStoreRequest;
use App\Http\Requests\TodoListUpdateRequest;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoListController extends Controller
{
    public function index(Request $request)
    {
    }

    public function create()
    {
        return response()->view('todo.list.create');
    }

    public function store(TodoListStoreRequest $request)
    {
        $todoList = new TodoList($request->validated());
        $request->user()->TodoLists()->save($todoList);

        return redirect(route('user.dashboard'));
    }

    public function show(TodoList $todoList, Request $request)
    {
    }

    public function edit(TodoList $todoList)
    {
        return response()->view('todo.list.edit', compact('todoList'));
    }

    public function update(TodoListUpdateRequest $request, TodoList $todoList)
    {
        $todoList->update($request->validated());
        return redirect()->back();
    }

    public function destroy(TodoList $todoList)
    {
        $todoList->delete();
        return redirect(route('user.dashboard'));
    }
}
