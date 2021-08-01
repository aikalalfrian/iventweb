<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $product = Product::where('id',"=", $product)->first();
        $id = auth()->user()->id;
        $product = Product::find($id);

	// mengirim data pegawai ke view pegawai
	return view('detailProduct', ['product' => $product]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function show()
    // {
    //     $id = auth()->user()->id;
    //     $product = Product::find($id);

    //     return view('detailproduct', compact('product'));
    // }

}



// SEMENTARA_TIDAK_DIPAKAI
