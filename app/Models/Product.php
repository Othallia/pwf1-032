<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Kolom ini WAJIB ada agar fungsi ->update() atau ::create() jalan
    protected $fillable = [
        'name',
        'qty',   // Pastikan 'qty' ada di sini
        'price', // Pastikan 'price' ada di sini
        'user_id',
        'category_id', // Ditambahkan untuk relasi ke tabel category
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: 1 Produk dimiliki oleh 1 Kategori
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}