<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\SyncJournalThird;

class SyncJournalThirdFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SyncJournalThird::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'cover' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'issn_print' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'issn_online' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'publisher' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'contact_email' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'contact_name' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'description' => $this->faker->text(),
            'aims_and_scope' => $this->faker->text(),
            'archive_url' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'submit_url' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'author_guide_url' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'path' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'base_url' => $this->faker->regexify('[A-Za-z0-9]{255}'),
        ];
    }
}
