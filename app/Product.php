<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    // use HasFactory;

    protected $table = 'products';
    public $timestamps = true;

    // protected $casts = [
    //     'harga' => 'float'
    // ];


    protected $fillable = [
        'id_user',
        'name',
        'detail',
        'harga',
        'stok_produk',
        'lokasi',
        'kategori',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }




}
