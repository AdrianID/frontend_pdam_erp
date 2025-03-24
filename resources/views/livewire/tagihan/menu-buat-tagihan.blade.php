<div class="bg-white rounded-xl shadow-sm mx-6 my-3">
    <!-- Layout Utama -->
    <div class="p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">Formulir Buat Tagihan</h2>
        
        <!-- Form -->
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Jenis Tagihan -->
                <div>
                    <label for="jenis_tagihan" class="block text-sm font-medium text-gray-700 mb-1">
                        Jenis Tagihan
                    </label>
                    <select id="jenis_tagihan" 
                        wire:model="jenis_tagihan" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 select2">
                        <option value="">Pilih Jenis Tagihan</option>
                        <option value="sambungan_baru">Sambungan Baru</option>
                        <option value="penggunaan_air">Penggunaan Air</option>
                        <option value="pemeliharaan">Pemeliharaan</option>
                    </select>
                    @error('jenis_tagihan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

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

                <!-- Jenis Pelanggan -->
                <div>
                    <label for="jenis_pelanggan" class="block text-sm font-medium text-gray-700 mb-1">
                        Jenis Pelanggan
                    </label>
                    <input type="text" 
                        id="jenis_pelanggan" 
                        wire:model="jenis_pelanggan" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        readonly />
                    @error('jenis_pelanggan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
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

                <!-- Spesifikasi Meter -->
                <div>
                    <label for="spesifikasi_meter" class="block text-sm font-medium text-gray-700 mb-1">
                        Spesifikasi Meter (Diameter)
                    </label>
                    <input type="text" 
                        id="spesifikasi_meter" 
                        wire:model="spesifikasi_meter" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        readonly />
                    @error('spesifikasi_meter') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Biaya -->
                <div>
                    <label for="biaya" class="block text-sm font-medium text-gray-700 mb-1">
                        Biaya
                    </label>
                    <input type="text" 
                        id="biaya" 
                        wire:model="biaya" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        readonly />
                    @error('biaya') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- PPN 11% -->
                <div>
                    <label for="ppn" class="block text-sm font-medium text-gray-700 mb-1">
                        PPN 11%
                    </label>
                    <input type="text" 
                        id="ppn" 
                        wire:model="ppn" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        readonly />
                    @error('ppn') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Total Tagihan -->
                <div>
                    <label for="total_tagihan" class="block text-sm font-medium text-gray-700 mb-1">
                        Total Tagihan
                    </label>
                    <input type="text" 
                        id="total_tagihan" 
                        wire:model="total_tagihan" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        readonly />
                    @error('total_tagihan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Durasi Tagihan -->
                <div>
                    <label for="durasi_tagihan" class="block text-sm font-medium text-gray-700 mb-1">
                        Durasi Tagihan
                    </label>
                    <input type="text" 
                        id="durasi_tagihan" 
                        wire:model="durasi_tagihan" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        readonly />
                    @error('durasi_tagihan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
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
                    Cetak Tagihan
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