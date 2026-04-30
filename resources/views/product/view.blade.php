<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#1e2336] overflow-hidden shadow-sm sm:rounded-xl border border-gray-700/50 p-8">
                
                <!-- Bagian Header (Judul & Tombol) -->
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-4">
                        <a href="{{ route('product.index') }}" class="p-2 text-gray-400 hover:text-white transition rounded-lg hover:bg-gray-700/50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                        <div>
                            <h2 class="text-2xl font-bold text-white tracking-tight">Product Detail</h2>
                            <p class="text-sm text-gray-400 mt-1">Viewing product #{{ $product->id }}</p>
                        </div>
                    </div>

                    <div class="flex gap-3">
                        {{-- Fitur @can dimatikan sementara agar tombol selalu terlihat --}}
                        <x-edit-button :url="url('/product/edit/' . $product->id)" />
                        
                        <x-delete-button :action="route('product.delete', $product->id)" />
                    </div>
                </div>

                <!-- Bagian Detail Produk (Tabel Bersusun) -->
                <div class="border border-gray-700/70 rounded-xl overflow-hidden text-sm">
                    
                    <!-- Product Name -->
                    <div class="flex border-b border-gray-700/70 px-6 py-4 bg-gray-800/20">
                        <div class="w-1/3 text-gray-400">Product Name</div>
                        <div class="w-2/3 font-bold text-white">{{ $product->name }}</div>
                    </div>
                    
                    <!-- Quantity -->
                    <div class="flex border-b border-gray-700/70 px-6 py-4 bg-gray-800/20">
                        <div class="w-1/3 text-gray-400">Quantity</div>
                        <div class="w-2/3">
                            <span class="px-2.5 py-1 bg-green-500/10 text-green-400 border border-green-500/20 rounded-md text-xs font-semibold">
                                {{ $product->qty }} In Stock
                            </span>
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="flex border-b border-gray-700/70 px-6 py-4 bg-gray-800/20">
                        <div class="w-1/3 text-gray-400">Price</div>
                        <div class="w-2/3 font-bold text-white">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>
                    </div>

                    <!-- Owner -->
                    <div class="flex border-b border-gray-700/70 px-6 py-4 bg-gray-800/20">
                        <div class="w-1/3 text-gray-400">Owner</div>
                        <div class="w-2/3 flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-indigo-600 flex items-center justify-center text-xs text-white font-bold">
                                {{ strtoupper(substr($product->user->name ?? 'U', 0, 1)) }}
                            </div>
                            <span class="text-white">{{ $product->user->name ?? '-' }}</span>
                        </div>
                    </div>

                    <!-- Created At -->
                    <div class="flex border-b border-gray-700/70 px-6 py-4 bg-gray-800/20">
                        <div class="w-1/3 text-gray-400">Created At</div>
                        <div class="w-2/3 text-white">{{ $product->created_at->format('d M Y, H:i') }}</div>
                    </div>

                    <!-- Updated At -->
                    <div class="flex px-6 py-4 bg-gray-800/20">
                        <div class="w-1/3 text-gray-400">Updated At</div>
                        <div class="w-2/3 text-white">{{ $product->updated_at->format('d M Y, H:i') }}</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>