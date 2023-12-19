<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id'; // Specify the primary key name if it's different from 'id'

    protected $fillable = ['item_id', 'material_used', 'is_framed', 'height', 'length', 'width', 'type','is_archived'];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

}


