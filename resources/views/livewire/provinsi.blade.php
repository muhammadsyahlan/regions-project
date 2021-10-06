<div class="grid justify-items">
    <table class="table-auto divide-y divide-gray-200">
        <thead class="bg-yellow-200">
            <tr>
                <th scope="col" class="px-6 py-3 text-center text-xs font-normal text-black uppercase tracking-wider">
                <p> No </p>
                </th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-normal text-black uppercase tracking-wider">
                <p> Nama Provinsi</p>
                </th>
            </tr>
        </thead>
        @foreach($prov as $provinsi)
        <tbody class="bg-white divide-y divide-gray-300">
            <tr class="bg-emerald-200">
                <td class="px-6 py-4 text-center whitespace-nowrap">
                    
                    
                        {{$provinsi->id}}
                    
                    
                </td>
                <td class="px-6 py-4 text-center whitespace-nowrap">
                    
                    
                        {{$provinsi->nama_prov}}
                    
                    
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
        
</div>