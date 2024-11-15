<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\JobsListing;
use app\Models\tag;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tags_jobs>
 */
class TagsJobsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "tag_id"=>tag::factory(),
            "job_id"=>JobsListing::factory(),
        ];
    }
}
