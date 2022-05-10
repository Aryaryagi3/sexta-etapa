<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BorrowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'returned' => $this->faker->boolean,
            'user_id' => $this->faker->unique(true)->numberBetween(1, 100),
            'book_id' => $this->faker->unique(true)->numberBetween(1, 100),
        ];
    }
}
