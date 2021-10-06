<table class="mx-6 divide-y divide-gray-200">

    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                No
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Nama Provinsi
            </th>
        </tr>
    </thead>
    @foreach($prov as $provinsi)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                
                    {{$provinsi->id}}
                
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                
                    {{$provinsi->nama_prov}}
                
                </div>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
    
