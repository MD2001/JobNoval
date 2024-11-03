<?php

namespace Database\Seeders;

use App\Models\JobEmploerTag;
use App\Models\JobsListing;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        JobsListing::factory(30)->create();
    }
}
