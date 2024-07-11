<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function indexOrder()
    {
        //
    }

    public function indexRegister()
    {
        return view('indexes.indexRegister');
    }

    public function indexActivate()
    {
        return view('indexes.indexActivate');
    }

    public function indexExpiry()
    {
        return view('indexes.indexExpiry');
    }

    public function indexCatalog()
    {
        return view('indexes.indexCatalog');
    }

    public function indexGenerate()
    {
        //
    }
}
