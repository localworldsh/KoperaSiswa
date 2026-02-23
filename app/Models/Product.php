<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan oleh model ini.
     * (Secara default Laravel akan mencari tabel bernama 'products')
     */
    protected $table = 'products';

    /**
     * Atribut yang dapat diisi secara massal (Mass Assignment).
     * Kolom-kolom ini harus sesuai dengan yang ada di file migrasi dan form input.
     */
    protected $fillable = [
        'seller_name', 
        'seller_class', 
        'phone', 
        'product_name', 
        'category', 
        'price', 
        'description', 
        'image' // Kolom foto yang baru kita tambahkan
    ];

    /**
     * (Opsional) Casting tipe data.
     * Memastikan harga selalu dianggap sebagai angka/integer.
     */
    protected $casts = [
        'price' => 'integer',
    ];
}