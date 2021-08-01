<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $products = Product::where('id_user', '=', Auth::user()->id)->paginate(8);


        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'harga' => 'required',
            'image' => 'array|required',
            'stok_produk' => 'required',
            'lokasi' => 'required',
            'kategori' => 'required',
        ]);

        try {
            $data = new Product();
            $data->id_user = Auth::user()->id;
            $data->name = $request->name;
            $data->detail = $request->detail;
            $data->harga = $request->harga;
            $data->stok_produk = $request->stok_produk;
            $data->lokasi = $request->lokasi;
            $data->kategori = $request->kategori;
            $data->save();

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('image');

            // if ($file->getClientOriginalExtension() == "jpg" || $file->getClientOriginalExtension() == "jpeg" || $file->getClientOriginalExtension() == "png") {

                foreach ($file as $key=>$img) {
                        // nama file
                echo 'File Name: ' . $img->getClientOriginalName();
                echo '<br>';

                // ekstensi img
                echo 'img Extension: ' . $img->getClientOriginalExtension();
                echo '<br>';

                // real path
                echo 'img Real Path: ' . $img->getRealPath();
                echo '<br>';

                // ukuran img
                echo 'img Size: ' . $img->getSize();
                echo '<br>';

                // tipe mime
                echo 'img Mime Type: ' . $img->getMimeType();

                // isi dengan nama folder tempat kemana img diupload
                $tujuan_upload = 'public/image/';
                $img->move($tujuan_upload, "image_" .$key. $request->name . "_" . $request->kategori . "." .$img->getClientOriginalName(). $img->getClientOriginalExtension());

                $name = $tujuan_upload . "image_" .$key. $request->name . "_" . $request->kategori . "." .$img->getClientOriginalName(). $img->getClientOriginalExtension();

                $data->images()->create([
                    'image' => $name,
                ]);
                }

            // } else {

            //     return redirect()->route('products.index')
            //         ->with('error', 'File Harus JPG/JPEG atau PNG');
            // }


            // $data->save();
        } catch (\Throwable $th) {
            return redirect()->route('products.index')
                ->with('error', $th->getMessage());
        }
        return redirect()->route('products.index')
            ->with('success', 'Produk Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        // dd($product);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        // dd($product);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'harga' => 'required',
            'stok_produk' => 'required',
            'lokasi' => 'required',
            'kategori' => 'required',
        ]);

        try {
            $data = Product::where('id_user', Auth::user()->id)->where('id', $id)->first();
            $data->id_user = Auth::user()->id;
            $data->name = $request->name;
            $data->detail = $request->detail;
            $data->harga = $request->harga;
            $data->stok_produk = $request->stok_produk;
            $data->lokasi = $request->lokasi;
            $data->kategori = $request->kategori;
            $data->save();
            $data->images()->delete();

            // menyimpan data file yang diupload ke variabel $file
            if ($request->hasFile('image')) {
                // menyimpan data file yang diupload ke variabel $file
                // $file = $request->file('image');
                $file = $request->file('image');

                // if ($file->getClientOriginalExtension() == "jpg" || $file->getClientOriginalExtension() == "jpeg" || $file->getClientOriginalExtension() == "png") {

                foreach ($file as $key=>$img) {
                // nama file
                echo 'File Name: ' . $img->getClientOriginalName();
                echo '<br>';

                // ekstensi img
                echo 'img Extension: ' . $img->getClientOriginalExtension();
                echo '<br>';

                // real path
                echo 'img Real Path: ' . $img->getRealPath();
                echo '<br>';

                // ukuran img
                echo 'img Size: ' . $img->getSize();
                echo '<br>';

                // tipe mime
                echo 'img Mime Type: ' . $img->getMimeType();

                // isi dengan nama folder tempat kemana img diupload
                $tujuan_upload = 'public/image/';
                $img->move($tujuan_upload, "image_" .$key. $request->name . "_" . $request->kategori . "." .$img->getClientOriginalName(). $img->getClientOriginalExtension());

                $name = $tujuan_upload . "image_" .$key. $request->name . "_" . $request->kategori . "." .$img->getClientOriginalName(). $img->getClientOriginalExtension();

                $data->images()->create([
                    'image' => $name,
                ]);
                }
            }

            //     } else {

            //         return redirect()->route('products.index')
            //             ->with('error', 'File Harus JPG/JPEG atau PNG');
            //     }
            // }

            // $data->save();
        } catch (\Throwable $th) {
            return redirect()->route('products.index')
                ->with('error', $th->getMessage());
        }

        return redirect()->route('products.index')
            ->with('success', 'Produk Berhasil Diperbaharui!');
    }

    public function transaksi() {
        $transaksi= Auth::user()->transaksi;

        return view('products.transaksi', compact('transaksi'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    { {
            $product->delete();

            return redirect()->route('products.index')
                ->with('success', 'Product deleted successfully');
        }
    }


}
