<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductsController extends Controller
{

    public function index() {

        $products = Products::listAllProducts();
        return Inertia::render('Waiter/Products/ListAllProducts.vue', ['products' => $products]);

    }

    public function edit($id) {

        $product = Products::listUser($id);
        return Inertia::render('Waiter/Products/EditProduct.vue', ['product' => $product]);

    }


}
