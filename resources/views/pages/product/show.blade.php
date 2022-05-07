<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('product.index') }}"
                        class="bg-transparent hover:bg-rose-500 text-rose-700 font-semibold hover:text-white py-2 px-4 border border-rose-500 hover:border-transparent rounded">
                        {{ __('Back to Index') }}
                    </a>
                </div>
                <div class="flex justify-center space-x-4 border-b border-gray-200 p-6">
                    <div class="w-1/2">
                        <div class="bg-white">
                            <table class="table-fixed w-full border border-slate-400">
                                <tr>
                                    <th class="border border-slate-300 p-3">Product Name</th>
                                    <td class="border border-slate-300 p-3">{{ $product->name }}</td>
                                </tr>
                                <tr>
                                    <th class="border border-slate-300 p-3">Description</th>
                                    <td class="border border-slate-300 p-3">
                                        <p>
                                            {!! $product->description !!}
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="border border-slate-300 p-3">Price</th>
                                    <td class="border border-slate-300 p-3">{{ $product->price }}</td>
                                </tr>
                                <tr>
                                    <th class="border border-slate-300 p-3">Created at</th>
                                    <td class="border border-slate-300 p-3">{{ $product->created_at }}</td>
                                </tr>
                                <tr>
                                    <th class="border border-slate-300 p-3">Updated at</th>
                                    <td class="border border-slate-300 p-3">{{ $product->updated_at }}</td>
                                </tr>
                                <tr>
                                    <td class="border border-slate-300 p-3" colspan="2">
                                        <div class="flex justify-between space-x-4">
                                            <a href="{{ route('product.destroy', $product->id) }}"onclick="confirm('Are you sure to delete this data?')"
                                                class="bg-transparent hover:bg-rose-500 text-rose-700 font-semibold hover:text-white py-2 px-4 border border-rose-500 hover:border-transparent rounded">
                                                {{ __('Delete') }}
                                            </a>
                                            <a href="{{ route('product.edit', $product->id) }}"
                                                class="bg-transparent hover:bg-teal-500 text-teal-700 font-semibold hover:text-white py-2 px-4 border border-teal-500 hover:border-transparent rounded">
                                                {{ __('Edit') }}
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    </div>
    </div>

    <script>
        function ProductStore() {
            return {
                formData: {
                    name: 'Sepatu Kulit',
                    description: 'Sepatu Kulit Mahal \nSangat Mantap',
                    price: '15000',
                },
                status: '',

                submitForm() {
                    this.status = "processing.."
                    fetch("{{ route('product.store') }}", {
                            method: 'POST',
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
                                window.location.replace("{{ route('product.index') }}");
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
    </script>
</x-app-layout>
