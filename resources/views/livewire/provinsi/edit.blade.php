<!-- This example requires Tailwind CSS v2.0+ -->
<div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>


        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <form>
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">


                    <div>
                        <h1 class="font-bold text-center mb-4">Edit Prov</h1>
                    </div>

                    <div>
                        <div class="mb-5">
                            <input wire:model="postId" type="hidden"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900">
                        </div>

                        <div class="mb-5">
                            <label for="Title" class="block">Nama Provinsi</label>
                            <input wire:model="title" type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900"
                                placeholder="Masukan Nama Provinsi">
                        </div>

                        <div class="mb-2">
                            <label for="Title" class="block">Deskripsi Provinsi</label>
                            <textarea wire:model="description"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900"
                                placeholder="Masukan Deskripsi Provinsi">
                            </textarea>
                        </div>

                        <div class="mb-2">
                            <label for="Title" class="block">Upload Logo</label>
                            @if($logo !== null )
                            
                            <img src="{{ asset('storage/'.$logo) }}"  width="100" height="200">
                            <button wire:click="editLogo()" type="button">Edit Logo</button>
                            @else
                            <input wire:model="logoedit" type="file">
                            @error('logoedit') <span class="error">{{ $message }}</span> @enderror
                            @endif
                            
                        </div>

                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button wire:click.prevent="update()" type="submit"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Submit
                    </button>
                    <button wire:click="hideEdit()" type="button"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
