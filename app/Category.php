<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'categories';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'body',
    ];
}