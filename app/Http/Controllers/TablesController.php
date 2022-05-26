<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Tables;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TablesController extends Controller
{
    
    public function index() {

        $tables = Tables::ListAllTables();
        $products = Products::listAllProducts();
        return Inertia::render('Waiter/Tables/ListAllTables.vue', 
        ['tables' => $tables, 'products' => $products]);        

    }


}
