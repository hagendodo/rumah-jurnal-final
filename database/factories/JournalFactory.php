<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Journal;
use App\Models\User;

class JournalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Journal::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'issn_print' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'issn_online' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'about_desc' => $this->faker->text(),
            'scope_desc' => $this->faker->text(),
            'journal_url' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'cover_url' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'submit_url' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'guide_url' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'archive_url' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'publisher' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'contact_name' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'contact_email' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'user_id' => User::factory(),
            'slug' => $this->faker->slug(),
            'is_active' => $this->faker->boolean(),
            'is_image_from_sync' => $this->faker->boolean(),
            'path' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'is_manual_created' => $this->faker->boolean(),
            'accreditation' => $this->faker->randomElement(["NOT_ACCREDITED","SINTA_1","SINTA_2","SINTA_3","SINTA_4","SINTA_5","SINTA_6"]),
        ];
    }
}
