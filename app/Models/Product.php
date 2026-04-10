<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Semua kode harus di dalam kurung kurawal ini
    protected $fillable = ['name', 'qty', 'price', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}