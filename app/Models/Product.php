<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'category_id',
        'title',
        'shortdes',
        'price',
        'description',
        'image',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
