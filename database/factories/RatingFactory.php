<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Movie;
use App\Models\Rating;
use App\Models\User;

class RatingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rating::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'score' => $this->faker->randomFloat(0, 0, 9999999999.),
            'movie_id' => Movie::factory(),
            'user_id' => User::factory(),
        ];
    }
}
