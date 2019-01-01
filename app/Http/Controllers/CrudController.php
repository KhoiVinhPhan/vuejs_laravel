<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CrudController extends Controller
{

    public function index()
    {
        return Product::get();
    }
}
