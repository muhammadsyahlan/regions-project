<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="container overflow-x-auto max-w-7xl grid justify-items-center">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="text-center my-4 font-bold">
                                Daftar Identitas
                            </div>
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mb-4">
                                <div class="grid justify-items">
                                    <button wire:click="showModal()"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Add Data Diri
                                    </button>
                                    @if ($is_open)
                                        @include('livewire.personal.create')
                                    @endif
                                    @if (session()->has('info'))
                                        <div class="bg-green-500 border-2 border-green-600 rounded-b mb-2 py-3 px-3">
                                            <div>
                                                <h1 class="text-white font-bold">{{ session('info') }}</h1>
                                            </div>
                                        </div>

                                    @endif
                                    @if (session()->has('delete'))
                                        <div class="bg-red-500 border-2 border-red-600 rounded-b mb-2 py-3 px-3">
                                            <div>
                                                <h1 class="text-white font-bold">{{ session('delete') }}</h1>
                                            </div>
                                        </div>
                                    @endif

                                    <table class="table-auto divide-y divide-gray-200 ">

                                        <thead class="bg-gray-50">
                                            <tr class="bg-yellow-200">
                                                <th scope="col"
                                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    No
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Nama Lengkap
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Jenis Kelamin
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Golongan Darah
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Alamat
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Kota / Kabupaten
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Provinsi
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Hobby
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Keterangan
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>


                                        <!-- penomoran otomatis -->
                                        @php
                                            $no = 1;
                                        @endphp
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($data as $personal)
                                                <tr>
                                                    <td class="px-6 py-4 text-center whitespace-nowrap">

                                                        {{ $no++ }}

                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">

                                                            {{ $personal->nama }}

                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            @if ($personal->gender == 1)
                                                                Laki-Laki

                                                            @else
                                                                Perempuan
                                                            @endif

                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">

                                                            {{ $personal->goldar }}

                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">

                                                            {{ $personal->alamat }}

                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">

                                                            {{ $personal->kotkab->nama_kotkab }}

                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">

                                                            {{ $personal->prov->nama_prov }}

                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">

                                                            {{ $personal->hobby_id }}

                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                        @if ($personal->keterangan == "")
                                                            <button wire:click="input({{ $personal->id }})"
                                                                type="button"
                                                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                                                Input
                                                            </button>
                                                        @else
                                                            {{ $personal->keterangan }}
                                                        @endif
                                                            
                                    
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="px-4 py-3 bg-gray-50 text-left sm:px-6">
                                                            <button wire:click="edit({{ $personal->id }})"
                                                                type="button"
                                                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                                                Edit
                                                            </button>

                                                            <button wire:click="delete({{ $personal->id }})"
                                                                type="button"
                                                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                                Delete
                                                            </button>


                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
