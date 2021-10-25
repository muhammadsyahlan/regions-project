<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="container overflow-x-auto max-w-7xl grid justify-items-center">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="text-center my-4 font-bold">
                                Detail Identitas
                            </div>
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mb-4">
                                <table class="table-auto divide-y divide-gray-200 ">
                                        <tbody class="bg-white divide-y divide-gray-200">
                                                <tr>
                                                    <td class="px-6 py-4 text-center whitespace-nowrap">

                                                        NAMA

                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">

                                                        {{ strtoupper($data->nama )}}

                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="px-6 py-4 text-center whitespace-nowrap">

                                                        GENDER 

                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">

                                                        @if ($data->gender == 1)
                                                            Laki-Laki

                                                        @else
                                                            Perempuan
                                                        @endif

                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="px-6 py-4 text-center whitespace-nowrap">

                                                        GOLONGAN DARAH 

                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">

                                                        {{ strtoupper($data->goldar) }}

                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="px-6 py-4 text-center whitespace-nowrap">

                                                        ALAMAT

                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">

                                                        {{ $data->alamat }}

                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="px-6 py-4 text-center whitespace-nowrap">

                                                        KOTA / KABUPATEN 

                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">

                                                        {{ $data->kotkab->nama_kotkab }}

                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="px-6 py-4 text-center whitespace-nowrap">

                                                        PROVINSI 

                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">

                                                        {{ $data->prov->nama_prov }}

                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="px-6 py-4 text-center whitespace-nowrap">

                                                        HOBBY

                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">

                                                        {{ $data->hobby_id }}

                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="px-6 py-4 text-center whitespace-nowrap">

                                                        KETERANGAN

                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">

                                                        {!!$data->keterangan!!}

                                                        </div>
                                                    </td>
                                                </tr>
                                        </tbody>
                                    </table>
                            </div>
                            <a href="{{ route('personal') }}"
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
