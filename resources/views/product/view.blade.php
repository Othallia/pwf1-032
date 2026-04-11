<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-6 text-white">
                        <div class="flex items-center gap-3">
                            <a href="{{ route('product.index') }}" class="p-1.5 rounded-md hover:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                            </a>
                            <h2 class="text-2xl font-bold">Product #{{ $product->id }}</h2>
                        </div>

                        <div class="flex gap-2">
                            @can('update', $product)
                            {{-- Cara Manual Agar Tidak Error --}}
                            <a href="{{ url('/product/edit/' . $product->id) }}" class="px-3 py-2 bg-amber-600 text-white rounded-lg text-sm font-medium">Edit</a>
                            @endcan

                            @can('delete', $product)
                            <form action="{{ route('product.delete', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="px-3 py-2 bg-red-600 text-white rounded-lg text-sm font-medium">Delete</button>
                            </form>
                            @endcan
                        </div>
                    </div>

                    <div class="border border-gray-700 rounded-lg divide-y divide-gray-700 text-gray-300">
                        <div class="px-5 py-4 flex justify-between"><span>Name</span><span class="font-bold text-white">{{ $product->name }}</span></div>
                        <div class="px-5 py-4 flex justify-between"><span>Stock</span><span>{{ $product->qty }} pcs</span></div>
                        <div class="px-5 py-4 flex justify-between"><span>Price</span><span class="text-indigo-400 font-mono">Rp {{ number_format($product->price, 0, ',', '.') }}</span></div>
                        <div class="px-5 py-4 flex justify-between"><span>Owner</span><span>{{ $product->user->name ?? '-' }}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>