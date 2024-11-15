<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobsListing extends Model
{
    /** @use HasFactory<\Database\Factories\JobsListingFactory> */
    use HasFactory;

    protected $fillable = ['name', 'salary', 'title', 'cname', "emploer_id"];

    public function emploer()
    {
        return $this->belongsTo(emploer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(tag::class);
    }
}
