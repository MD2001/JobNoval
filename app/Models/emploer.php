<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emploer extends Model
{
    /** @use HasFactory<\Database\Factories\EmploerFactory> */
    use HasFactory;

    public function job()
    {
        return $this->belongsToMany(JobsListing::class ,table:"job_emploer_tags");
    }
}
