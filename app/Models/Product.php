<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'code_product',
        'name',
        'price',
        'qty',
        'categorie_id',
    ];

    public function categorie()
    {
        return $this->belongsTo('App\Models\Categorie');
    }
}