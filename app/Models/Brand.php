<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'image_url',
        'website_url'
    ];


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
