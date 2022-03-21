<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoListStoreRequest;
use App\Http\Requests\TodoListUpdateRequest;
use App\Http\Resources\TodoListCollection;
use App\Http\Resources\TodoListResource;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoListController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(TodoList::class, 'todoList');
    }

    public function index(Request $request)
    {
        $todoLists = $request->user()->TodoLists()->get();

        if ($request->expectsJson()) {
            return new TodoListCollection($todoLists);
        }

        return view('todo.list.index', compact('todoLists'));
    }

    public function create()
    {
        return response()->view('todo.list.create');
    }

    public function store(TodoListStoreRequest $request)
    {
        $todoList = new TodoList($request->validated());
        $request->user()->TodoLists()->save($todoList);

        if ($request->expectsJson()) {
            return response('', 204);
        }

        return redirect(route('user.dashboard'));
    }

    public function show(TodoList $todoList, Request $request)
    {
        if ($request->expectsJson()) {
            return new TodoListResource($todoList);
        }

        return view('todo.list.show', compact('todoList'));
    }

    public function edit(TodoList $todoList)
    {
        return response()->view('todo.list.edit', compact('todoList'));
    }

    public function update(TodoListUpdateRequest $request, TodoList $todoList)
    {
        $todoList->update($request->validated());

        if ($request->expectsJson()) {
            return response('', 204);
        }

        return redirect()->back();
    }

    public function destroy(TodoList $todoList, Request $request)
    {
        $todoList->delete();

        if ($request->expectsJson()) {
            return response('', 204);
        }

        return redirect(route('user.dashboard'));
    }
}
