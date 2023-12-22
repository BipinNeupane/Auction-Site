<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testbase extends Model
{
    use HasFactory;

    protected $table = 'testbase';

    protected $fillable = [
        'name',
        'path',
    ];
}
