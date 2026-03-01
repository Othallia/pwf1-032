<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('About') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="space-y-4">
                        <div class="flex">
                            <span class="w-32 font-medium">Nama</span>
                            <span class="px-2">:</span>
                            <span>Octaviani Putri Anggraeni</span>
                        </div>

                        <div class="flex">
                            <span class="w-32 font-medium">NIM</span>
                            <span class="px-2">:</span>
                            <span>20230140032</span>
                        </div>

                        <div class="flex">
                            <span class="w-32 font-medium">Program Studi</span>
                            <span class="px-2">:</span>
                            <span>Teknologi Informasi</span>
                        </div>

                        <div class="flex">
                            <span class="w-32 font-medium">Hobi</span>
                            <span class="px-2">:</span>
                            <span>Bermain Game teka teki</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>