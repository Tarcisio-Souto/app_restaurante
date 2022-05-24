<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class WaitersController extends Controller
{
    
    public function index() {

        return Inertia::render('Waiter/Home.vue');

    }


}
