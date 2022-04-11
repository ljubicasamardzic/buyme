<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'path', 'category_id'];
    public $timestamps = false;

    public function getFormattedPriceAttribute()
    {
        return number_format($this->price / 100, 2);
    }
}
