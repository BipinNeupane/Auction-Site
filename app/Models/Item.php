<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'artist',
        'lot_number',
        'category_id',
        'year_produced',
        'subject_classification',
        'description',
        'auction_date',
        'estimated_price',
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
