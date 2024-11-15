<?php

namespace Database\Seeders;

use App\Models\JobsListing;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 3 unique tags (ensuring no duplicates)
        Tag::firstOrCreate(['name' => 'backend']);
        Tag::firstOrCreate(['name' => 'frontend']);
        Tag::firstOrCreate(['name' => 'AI']);

        // Get all tags (the 3 unique tags we just created)
        $tags = Tag::all();


        // Create job listings and assign random tags to each
        JobsListing::factory(30)->create()->each(function ($job) use ($tags) {
            // Attach 1 to 3 random tags to each job
            $randomTags = $tags->random(rand(1, 3))->pluck('id')->toArray();
            $job->tags()->attach($randomTags);
        });
    }
}
