<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a class="mb-5 block border-b border-gray-200 hover:border-blue-400" href="{{ route('algorithm.form') }}">
                        <div class="flex space-x-4">
                            <div class="w-1/5">
                                <img src="{{ asset('img/duck.jpg') }}" alt="" class="h-64" style="object-fit: cover">
                            </div>
                            <div class="w-4/5">
                                <h1 class="text-3xl font-bold">Algorithm (Gallant Duck) Test</h1>
                            </div>
                        </div>
                    </a>
                    <a class="mb-5 block border-b border-gray-200 hover:border-blue-400" href="{{ route('product.index') }}">
                        <div class="flex space-x-4">
                            <div class="w-1/5">
                                <img src="{{ asset('img/anone.png') }}" alt="" class="h-64" style="object-fit: cover">
                            </div>
                            <div class="w-4/5">
                                <h1 class="text-3xl font-bold">CRUD (Product Operation)</h1>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
