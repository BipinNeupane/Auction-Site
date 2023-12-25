<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $table = 'catalogs';
    protected $primaryKey = 'catalog_id';

    // You can specify the fillable columns to allow mass assignment
    protected $fillable = [
        'catalog_title,
        start_date,
        end_date,
        created_at,
        updated_at'
    ];
}
