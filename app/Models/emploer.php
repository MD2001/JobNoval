<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emploer extends Model
{
    protected $fillable=['name','email','password'];
    /** @use HasFactory<\Database\Factories\EmploerFactory> */
    use HasFactory;

    // public function job()
    // {
    //     $jobs = [];
    //     $x = $this->hasMany(JobEmploerTag::class);
    //     foreach ($x as $job) {
    //         $jobs[] = emploer::find($job['jobs_listing_id']);
    //     }
    //     return $jobs;
    // }
    public function job()
    {
        return $this->belongsToMany(
            emploer::class,
            'job_employer_tags',
            'main_model_id',      // Foreign key on JobEmployerTag table
            'jobs_listing_id'     // Foreign key on Employer table
        );
    }
}
