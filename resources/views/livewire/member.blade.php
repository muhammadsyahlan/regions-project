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
            </tr>
        </tbody>
        @endforeach
    </table>

</div>
