<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $fillable = ['name'];
    public function jobs()
    {
        return $this->hasMany(JobsListing::class);
    }
}
