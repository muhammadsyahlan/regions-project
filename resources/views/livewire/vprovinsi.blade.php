<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="container overflow-x-auto max-w-7xl grid justify-items-center">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="text-center my-4 font-bold">
                                Detail Provinsi
                            </div>
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mb-4">

                                <table class="table-auto divide-y divide-gray-200">

                                    <thead class="bg-gray-50">
                                        <tr class="bg-yellow-200">
                                            <th scope="col"
                                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Nama Provinsi
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Deskripsi
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Logo
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Kota / Kabupaten
                                            </th>
                                        </tr>
                                    </thead>



                                    <tbody class="bg-white divide-y divide-gray-200">

                                        <tr>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">

                                                    {{ $data->nama_prov }}

                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">

                                                    {{ $data->deskripsi }}

                                                </div>
                                            </td>
                                            
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <img src="{{ asset('storage/' . $data->logo) }}" width="100"
                                                        height="200">
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    @foreach ($kotkab as $kota)
                                                    - {{ $kota->nama_kotkab }} 
                                                    <br> 
                                                    @endforeach
                                                    

                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                                


                            </div>
                                <a href="{{ route('provinsi') }}"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                    Back
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
