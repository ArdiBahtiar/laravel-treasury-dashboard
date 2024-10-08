<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\TicketPool;

class IndexController extends Controller
{
    public function indexOrder()
    {
        $catalogs = Catalog::all();
        return view('indexes.indexOrder', ['catalogs' => $catalogs]);
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
        $catalogs = Catalog::all();
        return view('indexes.indexGenerate', ['catalogs' => $catalogs]);
    }
}
