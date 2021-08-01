<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Cart;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemorder = Order::whereHas('cart', function($q) {
            $q->where('status_cart', 'checkout');
        })
        ->orderBy('created_at', 'desc')
        ->paginate(20);
        return view('admin.transaksi.index', compact('itemorder'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $itemorder = Order::findOrFail($id);
            return view('admin.transaksi.show', compact('itemorder'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        if($request->status_pembayaran){
            $cart->update([
                'status_pembayaran' => $request->status_pembayaran,
            ]);
        }else if($request->status_pengiriman){
            $cart->update([
                'status_pengiriman' => $request->status_pengiriman,
            ]);
        }
        return back()->with('success','Sukses');
    }
}
