<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                {{-- Header --}}
                <div class="flex items-center gap-3 mb-6">
                    <a href="{{ route('category.index') }}" class="text-gray-400 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>
                    <h2 class="text-xl font-bold text-white">Add Category</h2>
                </div>

                <form action="{{ route('category.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300">Category Name</label>
                        <input type="text" name="name" id="name" placeholder="e.g. Electronic" 
                            class="mt-1 block w-full bg-gray-900 border-gray-700 text-white rounded-lg focus:ring-indigo-500">
                        @error('name')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-3">
                        <a href="{{ route('category.index') }}" class="px-4 py-2 text-sm text-gray-400">Cancel</a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>