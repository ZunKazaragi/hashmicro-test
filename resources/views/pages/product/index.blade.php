<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 bg-white border-b border-gray-200 flex justify-end">
                    <a href="{{ route('product.create') }}"
                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        {{ __('Create New Product') }}
                    </a>
                </div>
            <div class="flex space-x-4">
                <div class="w-full">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <table class="table-fixed w-full border border-slate-400">
                                <tr>
                                    <th class="border border-slate-300 p-3 font-bold">Name</th>
                                    <th class="border border-slate-300 p-3 font-bold">Price</th>
                                    <th class="border border-slate-300 p-3 font-bold">Last Change</th>
                                    <th class="border border-slate-300 p-3 font-bold">Action</th>
                                </tr>
                                @foreach ($products as $p)
                                    <tr class="w-1/5">
                                        <td class="border border-slate-300 p-3 font-bold">{{$p->name}}</td>
                                        <td class="border border-slate-300 p-3">Rp.{{number_format($p->price)}}</td>
                                        <td class="border border-slate-300 p-3">{{$p->updated_at ? $p->updated_at->format("d/m/Y H:i") : ''}}</td>
                                        <td class="border border-slate-300 p-3">
                                            <div class="flex justify-end space-x-4">
                                                <a href="{{ route('product.show', $p->id) }}"
                                                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                                    {{ __('Detail') }}
                                                </a>
                                                <a href="{{ route('product.edit', $p->id) }}"
                                                    class="bg-transparent hover:bg-teal-500 text-teal-700 font-semibold hover:text-white py-2 px-4 border border-teal-500 hover:border-transparent rounded">
                                                    {{ __('Edit') }}
                                                </a>
                                                <a href="{{ route('product.destroy', $p->id) }}" onclick="confirm('Are you sure to delete this data?')"
                                                    class="bg-transparent hover:bg-rose-500 text-rose-700 font-semibold hover:text-white py-2 px-4 border border-rose-500 hover:border-transparent rounded">
                                                    {{ __('Delete') }}

                                                </a>
                                            </div>
                                            </td>
                                    </tr>
                                @endforeach
                            </table>
                            <div class="my-5">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
