<?php

namespace Database\Factories;

use App\Models\emploer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobsListing>
 */
class JobsListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->jobTitle(),
            "emploer_id"=>emploer::factory(),
            'cname'=>fake()->company(),
            'salary'=>'$100,000',
        ];
    }
}
