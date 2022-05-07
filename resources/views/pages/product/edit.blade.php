<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('product.update', $product->id) }}" x-data="ProductUpdate()" @submit.prevent="submitForm">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div>
                        <div class="p-6 bg-white border-b border-gray-200">
                            <a href="{{ route('product.index') }}"
                                class="bg-transparent hover:bg-rose-500 text-rose-700 font-semibold hover:text-white py-2 px-4 border border-rose-500 hover:border-transparent rounded">
                                {{ __('Back to Index') }}
                            </a>
                        </div>
                    </div>
                    <div class="flex space-x-4 border-b border-gray-200">
                        <div class="w-1/2">
                            <div class="p-6 bg-white">
                                <table class="table-fixed w-full border border-slate-400">
                                    <tr>
                                        <th class="border border-slate-300 p-3">Product Name</th>
                                        <td class="border border-slate-300 p-3">{{ $product->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-slate-300 p-3">Description</th>
                                        <td class="border border-slate-300 p-3">
                                            <p>
                                                {!! nl2br($product->description)!!}
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="border border-slate-300 p-3">{{  __('Price') }}</th>
                                        <td class="border border-slate-300 p-3">Rp.{{ number_format($product->price) }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-slate-300 p-3">Created at</th>
                                        <td class="border border-slate-300 p-3">{{ $product->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-slate-300 p-3">Updated at</th>
                                        <td class="border border-slate-300 p-3">{{ $product->updated_at }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="w-1/2">
                            <div class="p-6 bg-white">
                                <div class="mb-3">
                                    <label for="name" class="block mb-3">{{ __('Product Name') }}</label>
                                    <input type="text" name="name" x-model="formData.name" id="name" placeholder="..."
                                        class="w-full border rounded text-gray-700 focus:outline-none items-center">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="block mb-3">{{ __('Description') }}</label>
                                    <textarea name="description" x-model="formData.description" id="name" placeholder="..."
                                        class="w-full border rounded text-gray-700 focus:outline-none items-center"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="block mb-3">{{ __('Price') }} (Rp.)</label>
                                    <input type="text" name="price" x-model="formData.price" id="name" placeholder="..."
                                        class="w-full border rounded text-gray-700 focus:outline-none items-center">
                                </div>
                                <div>
                                    <button
                                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                        {{ __('Update') }}
                                    </button>
                                    <span class="ml-3 text-stone-500" x-text="status"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function ProductUpdate() {
            return {
                formData: {
                    name: `{{ $product->name }}`,
                    description: `{{ $product->description }}`,
                    price: `{{ $product->price }}`,
                },
                status: '',

                submitForm() {
                    this.status = "processing.."
                    fetch("{{ route('product.update', $product->id) }}", {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': "application/json",
                                'X-CSRF-TOKEN': document.head.querySelector('meta[name=csrf-token]').content,
                            },
                            body: JSON.stringify(this.formData)
                        })
                        .then((response) => response.json())
                        .then((result) => {
                            console.log(result)
                            setTimeout(() => {
                                window.location.replace("{{ route('product.show', $product->id) }}");
                            }, 1000);
                            this.status = "Success (Redirecting...)";
                        })
                        .catch((error) => {
                            console.error(error);
                            this.status = "Failed";
                        })
                }
            }
        }
    </script>
</x-app-layout>
