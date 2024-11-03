<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emploer extends Model
{
    protected $fillable=['name','email','password'];
    /** @use HasFactory<\Database\Factories\EmploerFactory> */
    use HasFactory;

    
}
