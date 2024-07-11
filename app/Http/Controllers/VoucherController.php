<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

    public function checkRegistry(Request $request)
    {
        $vocer = $request->input('vocer');
        
        $ticket_pools = TicketPool::where('folio_id', $vocer)->first();
        
        if($ticket_pools)
        {
            return view('vouchers.RegisterClaim', ['vocer' => $vocer]);
        }
        else
        {
            return redirect()->back()->with('error', 'Invalid Voucher');    
        }
    }
    
    public function register()
    {
        $date = date('Y-m-d');
        $uuid = Str::uuid();
    }

    public function redeemVoucher(Request $request)
    {
        $vocer = $request->input('vocer');
        $date = date('Y-m-d');

        $cartItem = CartItem::where('folio_id', $vocer)->first();

        if(!$cartItem)
        {
            return redirect()->back()->with('error', 'Invalid Bos');
        }

        if($cartItem->redeemed)
        {
            return view('vouchers.ActivatorStatus', ['message' => 'Ticket telah digunakan pada tanggal: ' . $cartItem->redeemed_date]);
        }

        $order = Order::where('order_id', $cartItem->order_id)->first();
        if($order->visit_date > $date)
        {
            return view('vouchers.ActivatorClaim', ['vocer' => $vocer]);
        } else {
            return view('vouchers.ActivatorStatus', ['message' => 'Ticket sudah expired']);
        }
    }

    public function confirmVoucher($vocer)
    {
        $cartItem = CartItem::where('folio_id', $vocer)->first();
        if($cartItem && !$cartItem->redeemed)
        {
            $cartItem->redeemed = 1;
            $cartItem->redeemed_date = now()->toDateString();
            $cartItem->save();

            return redirect('/activate')->with('message', 'Voucher berhasil diklaim!');
        }

        return redirect('/activate')->with('error', 'Voucher gagal diklaim.');
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

    // public function search(Request $request)
    // {
    //     $query = $request->input('query');      // INI NGAMBIL INPUTAN DENGAN NAME query
    //     // dd($query);                          // ITU DUMP N DIE, CUMA BUAT LIHAT ISINYA DARI VARIABLE
    //     $tickets = TicketPool::where('folio_id', '=', $query)->get();
    //     return view('vouchers.searchResult', compact('tickets'));
    // }
}
