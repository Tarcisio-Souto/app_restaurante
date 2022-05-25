<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;

    public static function listAllProducts() {

        $products = DB::table('products')
        ->select('id', 'description', 'price')
        ->get();

        return $products;

    }

    public static function listUser($id) {

        $product = DB::table('products')
        ->select('id', 'description', 'price')
        ->where('id', '=', $id)
        ->get();

        return $product;

    }





}
