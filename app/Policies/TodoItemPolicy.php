<?php

namespace App\Policies;

use App\Models\TodoItem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TodoItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TodoItem  $todoItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, TodoItem $todoItem)
    {
        return $todoItem->TodoList->Owner->id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TodoItem  $todoItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, TodoItem $todoItem)
    {
        return $todoItem->TodoList->Owner->id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TodoItem  $todoItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, TodoItem $todoItem)
    {
        return $todoItem->TodoList->Owner->id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TodoItem  $todoItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, TodoItem $todoItem)
    {
        return $todoItem->TodoList->Owner->id === $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TodoItem  $todoItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, TodoItem $todoItem)
    {
        return $todoItem->TodoList->Owner->id === $user->id;
    }
}
