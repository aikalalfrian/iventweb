<?php

namespace App\Http\Controllers;

use App\CartDetail;
use App\Product;
use App\Cart;
use Illuminate\Http\Request;

class CartDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('404');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->produk_id);

        $validatedData = $request->validate([
            'id_product' => ['required'],
            'date_mulai' => ['required'],
            'date_selesai' => ['required'],
        ]);

        $dateMulai = date_create($request->date_mulai);
        $dateSelesai = date_create($request->date_selesai);
        $diff = (array) date_diff($dateMulai,$dateSelesai);
        $jumlahHari = $diff['days'];
        $itemuser = $request->user();
        $product = Product::findOrFail($request->id_product);
        // cek dulu apakah sudah ada shopping cart untuk user yang sedang login
        $cart = Cart::where('id_user', $itemuser->id)
                    ->where('status_cart', 'cart')
                    ->first();
        if ($cart) {
            $itemcart = $cart;
        } else {
            // $no_invoice = Cart::where('id_user', $itemuser->id)->count();
            //nyari jumlah cart berdasarkan user yang sedang login untuk dibuat no invoice
            $inputancart['id_user'] = $itemuser->id;
            $inputancart['id_penjual'] = Product::FindOrFail($request->id_product)->user->id;
            $inputancart['status_cart'] = 'cart';
            $inputancart['status_pembayaran'] = 'belum';
            $inputancart['status_pengiriman'] = 'belum';
            $itemcart = Cart::create($inputancart);
        }
        // cek dulu apakah sudah ada produk di shopping cart
        $cekdetail = CartDetail::where('id_user', $itemcart->id)
                                ->where('id_product', $product->id)
                                ->first();
        $harga = $product->harga;//ambil harga produk
        $subtotal = $harga;
        // diskon diambil kalo produk itu ada promo, cek materi sebelumnya
        if ($cekdetail) {
            // update detail di table cart_detail
            $cekdetail->updatedetail($cekdetail, $harga);
            // update subtotal dan total di table cart
            $cekdetail->cart->updatetotal($cekdetail->cart, $subtotal);
        } else {
            $inputan = $request->all();
            $inputan['id_user'] = $itemuser->id;
            $inputan['id_cart'] = $itemcart->id;
            $inputan['id_product'] = $product->id;
            $inputan['jumlahHari'] = $jumlahHari;
            $inputan['harga'] = $harga;
            $inputan['subtotal'] = $harga;
            $itemdetail = CartDetail::create($inputan);
            // update subtotal dan total di table cart
            $itemdetail->cart->updatetotal($itemdetail->cart, $subtotal);
        }

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $itemdetail = CartDetail::findOrFail($id);
        $param = $request->param;

        if ($param == 'tambah') {
            // update detail cart
            $itemdetail->updatedetail($itemdetail, $itemdetail->harga);
            // update total cart
            $itemdetail->cart->updatetotal($itemdetail->cart, $itemdetail->harga);
            return back()->with('success', 'Produk berhasil dipebaharui');
        }
        if ($param == 'kurang') {
            // update detail cart
            $itemdetail->updatedetail($itemdetail, $itemdetail->harga);
            // update total cart
            $itemdetail->cart->updatetotal($itemdetail->cart, $itemdetail->harga);
            return back()->with('success', 'Produk berhasil dipebaharui');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemdetail = CartDetail::findOrFail($id);
        // update total cart dulu
        $itemdetail->cart->updatetotal($itemdetail->cart, '-'.$itemdetail->subtotal);
        if ($itemdetail->delete()) {
            return back()->with('success', 'Produk berhasil dihapus');
        } else {
            return back()->with('error', 'Produk gagal dihapus');
        }
    }
}
