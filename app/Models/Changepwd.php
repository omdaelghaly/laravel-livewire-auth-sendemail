<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Changepwd extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'email', 'verifytoken','d','h','m','expire',
    ];
    protected $hidden=[];
}
