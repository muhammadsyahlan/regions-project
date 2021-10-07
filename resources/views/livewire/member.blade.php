<div class="px-4 py-3 bg-gray-50 text-left sm:px-6">
            <button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
              Add Provinsi
            </button>
</div>
<div class="grid justify-items"  >
    <table class="table-auto divide-y divide-gray-200">

        <thead class="bg-gray-50">
            <tr class="bg-yellow-200">
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    No
                </th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nama Provinsi
                </th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Deskripsi
                </th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Action
                </th>
            </tr>
        </thead>
        @foreach($prov as $provinsi)
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 text-center whitespace-nowrap">
                    
                        {{$provinsi->id}}
                                        
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                    
                        {{$provinsi->nama_prov}}
                    
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                    
                        {{$provinsi->deskripsi}}
                    
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="px-4 py-3 bg-gray-50 text-left sm:px-6">
                        <button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                            Edit
                        </button>
                        <button class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Delete
                        </button>
                    </div>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>

</div>
