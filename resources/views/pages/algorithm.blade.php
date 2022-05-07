<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Algorithm') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="flex space-x-4">
                <div class="w-1/2">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <p>
                                Buat suatu fitur untuk pengecekan dua free input dari user, dan system akan menghitung
                                berapa
                                persen karakter dari input pertama ada di input kedua dan akan dimunculkan ke user. <br>
                                Contoh: <br>
                            <ul class="ml-4">
                                <li>
                                    Input 1: ABBCD
                                </li>
                                <li>
                                    Input 2: Gallant Duck
                                </li>
                            </ul>
                            Karena karakter A dan D ada muncul di Gallant Duck, berarti 2 / 5 karakter (ABBCD = 5
                            karakter)
                            itu
                            muncul di input kedua, maka hasil = 40%

                            </p>

                        </div>
                    </div>
                </div>
                <div class="w-1/2" x-data="MyAlgorithm()">
                    <div class="mb-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="mb-6 p-6 bg-white border-b border-gray-200">
                            <form action="{{ route('algorithm.logic') }}" @submit.prevent="submitForm" method="POST">
                                <div class="mb-6">
                                    <label for="input1" class="block mb-6">{{ __('Character') }}</label>
                                    <input type="text" name="input1" x-model="formData.input1" id="input1" placeholder="ex: ABBCD" value="ABBCD"
                                        class="w-full border rounded text-gray-700 focus:outline-none items-center">
                                </div>
                                <div class="mb-6">
                                    <label for="input2" class="block mb-6">{{ __('Reference') }}</label>
                                    <input type="text" name="input2" x-model="formData.input2" id="input2" placeholder="ex: Gallant Duck" value="Gallant Duck"
                                        class="w-full border rounded text-gray-700 focus:outline-none items-center">
                                </div>

                                <div class="mb-6">
                                    <button
                                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                        {{ __('Hitung') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="mb-6 p-6 bg-white border-b border-gray-200">
                            <h5 class="mb-6">Hasil</h5>
                            <table class="table-fixed w-full border border-slate-400">
                                <tr class="w-1/5">
                                    <th class="border border-slate-300 p-3">Persentase Karakter Muncul</th>
                                    <td class="border border-slate-300 p-3" x-text="percentage">40%</td>
                                </tr>
                                <tr>
                                    <th class="border border-slate-300 p-3">Huruf Yang Ditemukan</th>
                                    <td class="border border-slate-300 p-3" x-text="foundedWord"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function MyAlgorithm() {
            return {
                formData : {
                    input1 : 'ABBCD',
                    input2 : 'Gallant Duck',

                },
                percentage: '',
                foundedWord: '',

                submitForm() {
                    fetch("{{ route('algorithm.logic') }}", {
                        method: 'POST',
                        headers: {
                        'Content-Type' : 'application/json',
                        'Accept': "application/json",
                        'X-CSRF-TOKEN': document.head.querySelector('meta[name=csrf-token]').content,
                        },
                        body: JSON.stringify(this.formData)
                    })
                    .then((response) => response.json())
                    .then((result) => {
                        console.log(result)
                        this.foundedWord = `${result.found_no_duplication}`;
                        this.percentage = `${result.percentage}%`;
                    })
                    .catch((error) => {
                        console.error(error);
                    })
                }
            }
        }
    </script>
</x-app-layout>
