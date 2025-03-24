<div class="bg-white rounded-xl shadow-sm mx-6 my-3">
    <!-- Layout Utama -->
    <div class="p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">Formulir Pembayaran Sambungan Baru</h2>
        
        <!-- Form -->
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nomor Pelanggan -->
                <div>
                    <label for="nomor_pelanggan" class="block text-sm font-medium text-gray-700 mb-1">
                        Nomor Pelanggan
                    </label>
                    <select id="nomor_pelanggan" 
                        wire:model="nomor_pelanggan" 
                        wire:change="loadPelangganData" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 select2">
                        <option value="">Pilih Nomor Pelanggan</option>
                        @foreach($pelangganList as $pelanggan)
                            <option value="{{ $pelanggan['id'] }}">{{ $pelanggan['nomor_pelanggan'] }}</option>
                        @endforeach
                    </select>
                    @error('nomor_pelanggan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Nama -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama
                    </label>
                    <input type="text" 
                        id="nama" 
                        wire:model="nama" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        readonly />
                    @error('nama') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Alamat -->
                <div class="md:col-span-2">
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">
                        Alamat
                    </label>
                    <input type="text" 
                        id="alamat" 
                        wire:model="alamat" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        readonly />
                    @error('alamat') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Jenis -->
                <div>
                    <label for="jenis" class="block text-sm font-medium text-gray-700 mb-1">
                        Jenis
                    </label>
                    <input type="text" 
                        id="jenis" 
                        wire:model="jenis" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        readonly />
                    @error('jenis') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Nomor Telp -->
                <div>
                    <label for="nomor_telp" class="block text-sm font-medium text-gray-700 mb-1">
                        Nomor Telp
                    </label>
                    <input type="text" 
                        id="nomor_telp" 
                        wire:model="nomor_telp" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        readonly />
                    @error('nomor_telp') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Nomor Tagihan -->
                <div>
                    <label for="nomor_tagihan" class="block text-sm font-medium text-gray-700 mb-1">
                        Nomor Tagihan
                    </label>
                    <input type="text" 
                        id="nomor_tagihan" 
                        wire:model="nomor_tagihan" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        readonly />
                    @error('nomor_tagihan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Tanggal Tagihan -->
                <div>
                    <label for="tanggal_tagihan" class="block text-sm font-medium text-gray-700 mb-1">
                        Tanggal Tagihan
                    </label>
                    <input type="text" 
                        id="tanggal_tagihan" 
                        wire:model="tanggal_tagihan" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        readonly />
                    @error('tanggal_tagihan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Jumlah Tagihan -->
                <div>
                    <label for="jumlah_tagihan" class="block text-sm font-medium text-gray-700 mb-1">
                        Jumlah Tagihan (Termasuk PPN)
                    </label>
                    <input type="text" 
                        id="jumlah_tagihan" 
                        wire:model="jumlah_tagihan" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        readonly />
                    @error('jumlah_tagihan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Jumlah Pembayaran -->
                <div>
                    <label for="jumlah_pembayaran" class="block text-sm font-medium text-gray-700 mb-1">
                        Jumlah Pembayaran
                    </label>
                    <input type="number" 
                        id="jumlah_pembayaran" 
                        wire:model="jumlah_pembayaran" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        required />
                    @error('jumlah_pembayaran') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Checkbox Disclaimer -->
                <div class="md:col-span-2">
                    <label class="inline-flex items-center">
                        <input type="checkbox" 
                            wire:model="disclaimer" 
                            class="form-checkbox h-4 w-4 text-blue-500" />
                        <span class="ml-2 text-sm text-gray-700">
                            Saya menyatakan bahwa jumlah pembayaran sudah sesuai dengan jumlah tagihan.
                        </span>
                    </label>
                    @error('disclaimer') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="mt-8 flex justify-end space-x-4">
                <!-- Reset Button -->
                <button type="button" 
                    wire:click="resetForm" 
                    class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Reset
                </button>
                
                <!-- Simpan Button -->
                <button type="submit" 
                    class="px-4 py-2 bg-blue-500 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Initialize Select2 -->
<script>
    document.addEventListener('livewire:load', function () {
        $('.select2').select2({
            placeholder: 'Pilih opsi',
            allowClear: true
        });

        $('.select2').on('change', function (e) {
            @this.set($(this).attr('wire:model'), $(this).val());
        });
    });
</script>