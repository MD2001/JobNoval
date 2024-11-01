<?php

namespace Database\Factories;

use App\Models\emploer;
use App\Models\JobsListing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job_emploer_tag>
 */
class JobEmploerTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           "emploer_id"=>emploer::factory(),
           "jobs_listing_id"=>JobsListing::factory(),
        ];
    }
}
