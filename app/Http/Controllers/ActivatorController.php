<?php

namespace App\Http\Controllers;

use App\Models\cart_item;
use Illuminate\Http\Request;

class ActivatorController extends Controller
{
    public function index () 
    {
        return view('activator.indexActivator');
    }

    public function activate ()
    {
        $cart_item = cart_item::all();
        $data = ['cart_item' => $cart_item];
        return view('activator.validateActivator');
    }
}
