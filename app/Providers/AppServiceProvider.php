<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Gate untuk mengontrol akses tombol tambah/hapus produk
        Gate::define('manage-product', function ($user) {
            return $user->role === 'admin';
        });

        // Gate Baru untuk UCP 1: Mengontrol akses ke menu Category
        Gate::define('manage-category', function ($user) {
            return $user->role === 'admin'; 
        });
    }
}