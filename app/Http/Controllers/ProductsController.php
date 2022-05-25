<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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

    public function update(Request $request)
    {
        
        $msg1 = '';

        $product = Products::find($request->id);
        $aux_price = explode(' ', $request->price);
        $price = (float) $aux_price[1];

        if ($price <= 0) {
            $msg1 = "Informe um valor maior que zero (0)";  
        }

        if ($msg1 != '') {
            $arr_err = Array(
                'price' => $msg1,   
            );
        }        
        
        if (isset($arr_err)) {
            return Redirect::route('product.edit', [$product->id])->withErrors($arr_err);
        } else {

            $product->price = $price;
            $product->description = $request->description;
            $product->save();

            $products = Products::listAllProducts();
            return Redirect::route('products.list', ['products' => $products]);
        }

    }





}
