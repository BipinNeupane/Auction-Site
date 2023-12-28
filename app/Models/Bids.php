<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bids extends Model
{
    use HasFactory;

    protected $table = 'bids';
    protected $primaryKey = 'bid_id';

    // You can specify the fillable columns to allow mass assignment
    protected $fillable = ['lot_number,
    bid_amount,
    bid_user'];


    public function products(){
        return $this->belongsTo(Products::class,'lot_number');
    }

}
