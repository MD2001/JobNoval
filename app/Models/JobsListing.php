<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobsListing extends Model
{
    /** @use HasFactory<\Database\Factories\JobsListingFactory> */
    use HasFactory;

    protected $fillable=['name','salary','title','cname'];
   
    public function emploer()
    {
        return $this->belongsToMany(emploer::class,table:"job_emploer_tags");
    }
    
}
