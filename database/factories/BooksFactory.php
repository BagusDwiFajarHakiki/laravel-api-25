<?php

namespace Database\Factories;

use App\Models\Authors;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Books>
 */
class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $authorId = Authors::inRandomOrder()->value('id');
        
        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'author_id' => $authorId,
            'published_year' => $this->faker->year(),
        ];
    }
}
