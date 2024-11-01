<?php

use App\Models\emploer;
use App\Models\JobsListing;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_emploer_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(emploer::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(JobsListing::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_emploer_tags');
    }
};
