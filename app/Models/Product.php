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
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}