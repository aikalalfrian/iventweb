<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
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
        $id = auth()->user()->id;
        $products = Product::all();

        return view('/home', compact('products', 'cari'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

        $products = Product::where('name','like',"%".$cari."%")->paginate(10);

        return view('search', compact('products', 'cari'));
    }

}
