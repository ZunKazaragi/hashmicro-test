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
                    <a class="mb-5 block border-b border-gray-200 hover:border-blue-400"
                        href="{{ route('algorithm.form') }}">
                        <div class="flex space-x-4">
                            <div class="w-1/5">
                                <img src="{{ asset('img/duck.jpg') }}" alt="" class="h-64"
                                    style="object-fit: cover">
                            </div>
                            <div class="w-4/5">
                                <h1 class="text-3xl font-bold">Algorithm (Gallant Duck) Test</h1>
                            </div>
                        </div>
                    </a>
                    <a class="mb-5 block border-b border-gray-200 hover:border-blue-400"
                        href="{{ route('product.index') }}">
                        <div class="flex space-x-4">
                            <div class="w-1/5">
                                <img src="{{ asset('img/anone.png') }}" alt="" class="h-64"
                                    style="object-fit: cover">
                            </div>
                            <div class="w-4/5">
                                <h1 class="text-3xl font-bold">CRUD (Product Operation)</h1>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-5">

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-xl mb-6">About Me</h1>

                <table class="table-fixed w-full border border-slate-400">
                    <tr>
                        <th class="border border-slate-300 p-3">Github</th>
                        <td class="border border-slate-300 p-3">
                            <a class="underline decoration-blue-500 text-blue-700 hover:text-blue-300" href="https://github.com/ZunKazaragi">ZunKazaragi</a>
                        </td>
                    </tr>
                    <tr>
                        <th class="border border-slate-300 p-3">Current Live Project</th>
                        <td class="border border-slate-300 p-3">
                            <a class="underline decoration-blue-500 text-blue-700 hover:text-blue-300" href="https://carshow.id">Carshow.id</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
