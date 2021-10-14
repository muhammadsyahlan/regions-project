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
                        <h1 class="font-bold text-center mb-4">Add Data Diri</h1>
                    </div>

                    <div>
                        <div class="mb-5">
                            <input wire:model="postId" type="hidden"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900">
                        </div>

                        <div class="mb-5">
                            <label for="Title" class="block">Nama Lengkap</label>
                            <input wire:model="title" type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900"
                                placeholder="Masukan Nama Lengkap">
                        </div>

                        <div class="mb-5">
                            <label for="Title" class="block">Jenis Kelamin</label>
                            <div class="mt-2">
                                <div>
                                    <label class="inline-flex items-center">
                                        <input wire:model="jkradio" type="radio" class="form-radio" name="radio"
                                            value="1" checked>
                                        <span class="ml-2">Laki-Laki</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input wire:model="jkradio" type="radio" class="form-radio" name="radio"
                                            value="0">
                                        <span class="ml-2">Perempuan</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label for="Title" class="block">Golongan Darah</label>
                            <div class="mt-2">
                                <select wire:model="goldar"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900">
                                    <option>Pilih Golongan Darah</option>
                                    <option value="a">A</option>
                                    <option value="b">B</option>
                                    <option value="ab">AB</option>
                                    <option value="o">O</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label for="Title" class="block">Alamat</label>
                            <textarea wire:model="alamat"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900"
                                placeholder="Masukan Alamat">
                            </textarea>
                        </div>

                        <div class="mb-5">
                            <label for="Title" class="block">Kota / Kabupaten</label>
                            <select wire:model="kotkab"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900">
                                <option>Pilih Kota / Kabupaten</option>
                                @foreach ($dataKotkab as $kotkab)
                                    <option value="{{ $kotkab }}">{{ $kotkab }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-5">
                            <label for="Title" class="block">Provinsi</label>
                            <select wire:model="prov"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900">
                                <option>Pilih Provinsi</option>
                                @foreach ($dataProv as $prov)
                                    <option value="{{ $prov }}">{{ $prov }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="Title" class="block">Hobby</label>
                            <textarea wire:model="hobby"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900"
                                placeholder="Masukan Hobby">
                            </textarea>
                        </div>

                        <div class="mb-2">
                            <label for="Title" class="block">Keterangan</label>
                            <div wire:model="description" id="summernote"></div>
                        </div>

                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button wire:click.prevent="store()" type="submit"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Submit
                    </button>
                    <button wire:click="hideModal()" type="button"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#summernote').summernote({
      placeholder: 'Hello stand alone ui',
      tabsize: 2,
      height: 120,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ]
    });
  </script>
