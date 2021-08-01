<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = [
        'id_user',
        'id_penjual',
        'status_cart',
        'status_pembayaran',
        'status_pengiriman',
        'subtotal',
        'total',
    ];

    public function user() {
        return $this->belongsTo('App\User','id_user');
    }

    public function detail() {
        return $this->hasMany('App\CartDetail', 'id_cart');
    }

    public function updatetotal($itemcart, $subtotal) {
        $this->attributes['subtotal'] = $itemcart->subtotal + $subtotal;
        $this->attributes['total'] = $itemcart->total + $subtotal;
        self::save();
    }

    public function order(){
        return $this->hasOne('App\Order', 'id_cart');
    }
}
