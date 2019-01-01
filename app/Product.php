<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public $table = 'products';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'price',
    ];
}