<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
      
      protected $table = 'categories';
      protected $primaryKey = 'category_id';

      // You can specify the fillable columns to allow mass assignment
      protected $fillable = ['category,
      created_at,
      updated_at'];
  
}
