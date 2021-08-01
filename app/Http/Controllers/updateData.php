<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;

class updateData extends Controller
{
    public function updateDate(Request $request){
        $itemcart = Cart::findOrFail($request->id_cart);
        $itemcart->update([
            'jumlahHari' => $request->diff,
        ]);

        return response()->json(['success'=>'Ajax request submitted successfully']);
    }

    public function test(){
        dd("test");
    }
}
