<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\CartItem;
use App\Models\Catalog;
use App\Models\Order;
use App\Models\TicketPool;

class VoucherController extends Controller
{
    public function order(Request $request) 
    {
        $amount = $request->input('amount');
        $catalog_id = $request->input('catalog_id');
        $date = date('Y-m-d');
        $expiryDate = $request->input('expiry');
        $orderedVouchers = [];

        for($i = 0; $i < $amount; $i++)
        {
            $uuid = Str::uuid()->toString();
            DB::transaction(function () use ($uuid, $catalog_id, $date, $expiryDate, &$orderedVouchers)
            {
                $topVoucher = TicketPool::where('catalog_id', $catalog_id)->first();
                $catalog = Catalog::where('catalog_id', $catalog_id)->first();
                $orderedVouchers[] = $topVoucher->folio_id;

                Order::create([
                    'order_id' => $uuid,
                    'order_date' => $date,
                    'visit_date' => $expiryDate,
                    'cancelled' => 0,
                    'merchant_info' => '9bf57c2c5d31fef114718441119ae1c9',
                    'cust_name' => 'freepass',
                    'cust_email' => '',
                    'cust_phone' => '',
                    'total_buy_price' => $catalog->product_price,
                ]);
                
                CartItem::create([
                    'cart_id' => $uuid . '-FP-0',
                    'folio_id' => $topVoucher->folio_id,
                    'order_id' => $uuid,
                    'redeemed' => 0,
                    'redeemed_date' => $date,
                    'catalog_id' => $catalog->catalog_id,
                    'product_desc' => $catalog->product_desc,
                    'product_price' => $catalog->product_price
                ]);

                $topVoucher->delete();
            });
        }

        // dd($orderedVouchers);
        return view('vouchers.OrderedTickets', ['orderedVouchers' => $orderedVouchers]);
    }

    public function checkRegistry(Request $request)
    {
        $vocer = $request->input('vocer');
        $ticket_pools = TicketPool::where('folio_id', $vocer)->first();
        
        if($ticket_pools)
        {
            return view('vouchers.RegisterClaim', ['vocer' => $vocer]);
        } else {
            return redirect()->back()->with('status', 'Invalid Voucher');    
        }
    }
    
    public function registerVoucher(Request $request)
    {
        $vocer = $request->input('vocer');
        $date = now()->format('Y-m-d');
        $tomorrow = now()->addDay()->format('Y-m-d');
        $redeem_date = date('Y-m-d', strtotime("-1 year"));
        $uuid = Str::uuid()->toString();
        
        $TicketPool = TicketPool::where('folio_id', $vocer)->first();

        if ($TicketPool)
        {
            DB::transaction(function () use ($vocer, $uuid, $date, $tomorrow, $redeem_date, $TicketPool)
            {
                $catalog = Catalog::where('catalog_id', $TicketPool->catalog_id)->first();
                TicketPool::where('folio_id', $vocer)->delete();
                
                Order::create([
                    'order_id' => $uuid,
                    'order_date' => $date,
                    'visit_date' => $tomorrow,
                    'cancelled' => 0,
                    'merchant_info' => '9bf57c2c5d31fef114718441119ae1c9',
                    'cust_name' => 'freepass',
                    'cust-email' => '',
                    'cust_phone' => '',
                    'total_buy_price' => $catalog->product_price,
                ]);

                CartItem::create([
                    'cart_id' => $uuid . '-FP-0',
                    'folio_id' => $vocer,
                    'order_id' => $uuid,
                    'redeemed' => 0,
                    'redeemed_date' => $redeem_date,
                    'catalog_id' => $catalog->catalog_id,
                    'product_desc' => $catalog->product_desc,
                    'product_price' => $catalog->product_price,
                ]);
            });

            return redirect('/registerVoucher')->with('status', 'Voucher Registered Succesfully');
        }
    }

    public function redeemVoucher(Request $request)
    {
        $vocer = $request->input('vocer');
        $date = date('Y-m-d');

        $cartItem = CartItem::where('folio_id', $vocer)->first();

        if(!$cartItem)
        {
            // return redirect()->back()->with('message', 'Invalid Bos');
            return view('vouchers.ActivatorStatus', ['message' => 'Invalid Voucher']);
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

            return redirect('/activate')->with('status', 'Voucher berhasil diklaim!');
        }

        return redirect('/activate')->with('status', 'Voucher gagal diklaim.');
    }
    
    public function updateExpiry(Request $request)
    {
        // $date = date('Y-m-d');
        $date = $request->input('expiry');
        $query = $request->input('query');
        $orderID = CartItem::where('folio_id', $query)->value('order_id');
        
        if($orderID)
        {
            Order::where('order_id', $orderID)->update(['visit_date' => $date]);
            // return view('vouchers.UpdateExpiry', ['orders' => $orders]);
            return redirect('/expiry')->with('status', 'Voucher Expiry Updated!');
        }
        else
        {
            return redirect('/expiry')->with('status', 'Invalid Voucher');
        }
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
        
        return redirect('/catalog')->with('status', 'Catalog Created Successfully');
    }

    public function generateVoucher(Request $request)
    {
        $amount = $request->input('amount');
        $catalog_id = $request->input('catalog_id');
        $generatedVouchers = [];

        for($i = 0; $i < $amount; $i++)
        {
            $uuid = Str::uuid()->toString();
            TicketPool::create([
                'catalog_id' => $catalog_id,
                'folio_id' => $uuid,
            ]);
            $generatedVouchers[] = $uuid;
        }
        
        // dd($generatedVouchers);
        return view('vouchers.GeneratedVouchers', ['generatedVouchers' => $generatedVouchers]);
    }
}