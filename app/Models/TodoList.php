<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TodoList extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title'
    ];

    public function Owner () {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function TodoItems ()
    {
        return $this->hasMany(TodoItem::class, 'list_id', 'id');
    }
}
