<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkemail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'code', 'verifytoken','d','h','m','expire',
    ];
    protected $hidden=[];
    
}
