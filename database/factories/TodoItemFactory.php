<?php

namespace Database\Factories;

use App\Models\TodoList;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TodoItem>
 */
class TodoItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $list = TodoList::all()->random()->id;

        return [
            "list_id" => $list,
            "title" => $this->faker->sentence(3),
            "description" => $this->faker->sentence(5),
            'done' => $this->faker->boolean(),
        ];
    }
}
