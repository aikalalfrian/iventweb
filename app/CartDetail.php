<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    protected $table = 'cart_detail';
    protected $fillable = [
        'jumlahHari',
        'id_user',
        'id_product',
        'id_cart',
        'harga',
        'subtotal',
    ];

    public function cart() {
        return $this->belongsTo('App\Cart', 'id_cart');
    }

    public function product() {
        return $this->belongsTo('App\Product', 'id_product');
    }

    // function untuk update qty, sama subtotal
    public function updatedetail($product, $harga) {
        $this->attributes['subtotal'] = $product->subtotal + $harga;
        self::save();
    }
}
