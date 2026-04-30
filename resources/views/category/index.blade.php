<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-white">Category List</h3>
                        <p class="text-sm text-gray-400">Manage your category</p>
                    </div>
                    <a href="{{ route('category.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm">+ Add Category</a>
                </div>

                <table class="min-w-full text-sm text-white">
                    <thead>
                        <tr class="border-b border-gray-700">
                            <th class="px-6 py-3 text-left uppercase">Name</th>
                            <th class="px-6 py-3 text-left uppercase">Total Product</th>
                            <th class="px-6 py-3 text-center uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @foreach ($categories as $category)
                        <tr>
                            <td class="px-6 py-4">{{ $category->name }}</td>
                            <td class="px-6 py-4 text-green-400">{{ $category->products_count }} Product</td> <!-- Total Product[cite: 1] -->
                            <td class="px-6 py-4 text-center">
                                <x-edit-button :url="route('category.edit', $category->id)" />
                                <x-delete-button :action="route('category.delete', $category->id)" />
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>