<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                    {{-- Menampilkan Role User sesuai instruksi UCP 1 --}}
                    <div class="mt-6 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                        <p class="text-sm text-gray-600 dark:text-gray-400 uppercase tracking-wider font-semibold">Current Access Level</p>
                        <p class="text-lg font-bold text-indigo-600 dark:text-indigo-400 mt-1">
                            Role: {{ Auth::user()->role }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>