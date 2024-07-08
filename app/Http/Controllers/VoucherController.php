<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Catalog;
use App\Models\Order;
use App\Models\TicketPool;

class VoucherController extends Controller
{
    public function order() 
    {
        //
    }

    public function register()
    {
        //
    }

    public function activate()
    {
        //
    }

    public function search(Request $request)
    {
        $query = $request->input('query');      // INI NGAMBIL INPUTAN DENGAN NAME query
        // dd($query);                          // ITU DUMP N DIE, CUMA BUAT LIHAT ISINYA DARI VARIABLE
        $tickets = TicketPool::where('folio_id', '=', $query)->get();
        // dd($tickets);
        return view('vouchers.searchResult', compact('tickets'));
    }
    
    public function updateExpiry(Request $request)
    {
        $date = date('Y-m-d');

        $query = $request->input('query');
        // $cartItems = CartItem::where('folio_id', $query)->get();         // PAKE GET() KALO MAU DIAMBIL SEMUA DATA DARI QUERY
        $orderID = CartItem::where('folio_id', $query)->value('order_id');
        $orders = Order::where('order_id', $orderID)->update(['visit_date' => $date]);

        return view('vouchers.searchResult', ['orders' => $orders]);
    }

    public function createCatalog()
    {
        //
    }

    public function generateVoucher()
    {
        //
    }

}
