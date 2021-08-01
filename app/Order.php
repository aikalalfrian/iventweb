<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = [
        'id_cart',
        'nama_penerima',
        'no_tlp',
        'alamat',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'kodepos',
        'bukti_pembayaran',
    ];

    public function cart() {
        return $this->belongsTo('App\Cart', 'id_cart');
    }
}
