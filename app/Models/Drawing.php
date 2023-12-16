<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drawing extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'drawing_medium',
        'framed',
        'dimensions_height',
        'dimensions_length',
        'image_path',
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
