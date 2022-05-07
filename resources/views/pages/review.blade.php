<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Algorithm') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex space-x-4">
                <div class="w-full">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <img src="{{ asset('img/review-1.png') }}" alt="" class="mb-5">
                            <p>
                                Buatlah sebuah fitur (atau lebih) yang didalamnya minimal mengaplikasikan fungsi-fungsi berikut:
                                <ol class="ml-3">
                                    <li>a. Nested loop</li>
                                    <li>b. Nested if</li>
                                    <li>c. Mathematics</li>
                                    <li>d. <a href="{{ route('product.index') }}" class="text-blue-500 underline decoration-blue-800">
                                        CRUD</a></li>
                                </ol>
                                <a href="{{ route('algorithm.form') }}" class="text-blue-500 underline decoration-blue-800">
                                    Gallant Duck test
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
