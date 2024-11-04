<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class emploer extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password','emploer_id'];
    /** @use HasFactory<\Database\Factories\EmploerFactory> */
    use HasFactory;

    public function job()
    {
        return $this->hasMany(JobsListing::class);
    }
}
