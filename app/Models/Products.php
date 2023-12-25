<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'lot_number'; // Specify the primary key name if it's different from 'id'

    protected $fillable = [
    'product_name',
    'artist',
    'category_id',
    'year_produced',
    'subject_classification',
    'description',
    'start_date',
    'end_date',
    'estimated_price',
    'material_used',
    'is_framed', 
    'height', 
    'length', 
    'width', 
    'weight',
    'image',
    'type',
    'is_archived'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // public function catalog(){
    //     return 
    // }
}


