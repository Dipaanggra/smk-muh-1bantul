<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Movie;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'year' => $this->faker->word(),
            'actors' => $this->faker->word(),
            'plot' => $this->faker->text(),
            'poster' => $this->faker->word(),
            'trailer' => $this->faker->word(),
        ];
    }
}
