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

    public function createCatalog(Request $request)
    {
        $catalog_id = $request->input('catalog_id');
        $product_desc = $request->input('product_desc');
        $product_price = $request->input('product_price');
        $product_info = $request->input('product_info');

        $data = [
            'catalog_id' => $catalog_id,
            'product_desc' => $product_desc,
            'product_price' => $product_price,
            'product_info' => $product_info,
        ];

        $insert = Catalog::insert($data);
        // $insert = Catalog::insert("INSERT INTO catalogs (catalog_id, product_desc, product_price, product_info) VALUES ('$catalog_id', '$product_desc', $product_price, '$product_info')");

        return redirect('/catalog')->with('status', $insert);
        // return redirect()->route('indexes.indexCatalog')->with('status', $insert);
    }

    public function generateVoucher()
    {
        //
    }

}
