<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use Illuminate\Support\Facades\Auth;


class SearchController extends Controller
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
        $cari = null;
        $kategori = '';
        $id = auth()->user()->id;
        $products = Product::paginate(16);

        $productEo = Product::where('kategori', config('category.category.eo'))->get();
        $productVendor = Product::where('kategori', config('category.category.vendor'))->get();
        // dd($productEo);

        return view('search', compact('products', 'cari', 'productEo', 'productVendor', 'kategori'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $kategori = $request->kategori;

        // dd($request);

        $products = Product::where('name','like',"%".$cari."%");
        if(!empty($kategori)){
            $products->where('kategori', $kategori);
        }
        $products = $products->orWhere('lokasi','like',"%".$cari."%")->paginate(5);
        return view('search', compact('products', 'cari', 'kategori'));
    }

}
