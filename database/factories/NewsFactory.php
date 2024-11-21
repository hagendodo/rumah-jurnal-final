<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\News;
use App\Models\User;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'thumbnail' => $this->faker->text(),
            'description' => $this->faker->text(),
            'content' => $this->faker->paragraphs(3, true),
            'slug' => $this->faker->slug(),
            'user_id' => User::factory(),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
