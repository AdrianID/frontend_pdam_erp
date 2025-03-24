<div class="bg-white rounded-xl shadow-sm mx-6 my-3">
    <!-- Layout Utama -->
    <div class="p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">Formulir Sambungan Baru</h2>
        
        <!-- Form -->
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- No. Pendaftaran -->
                <div>
                    <label for="no_pendaftaran" class="block text-sm font-medium text-gray-700 mb-1">
                        No. Pendaftaran
                    </label>
                    <select id="no_pendaftaran" 
                        wire:model="no_pendaftaran" 
                        wire:change="loadPelangganData" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 select2">
                        <option value="">Pilih No. Pendaftaran</option>
                        {{-- @foreach($pelangganList as $pelanggan)
                            <option value="{{ $pelanggan->id }}">{{ $pelanggan->no_pendaftaran }}</option>
                        @endforeach --}}
                        @foreach(range(1, 10) as $index)
                            <option value="2023{{ str_pad($index, 3, '0', STR_PAD_LEFT) }}">2023{{ str_pad($index, 3, '0', STR_PAD_LEFT) }}</option>
                        @endforeach
                    </select>
                    @error('no_pendaftaran') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Nama -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama
                    </label>
                    <input type="text" 
                        id="nama" 
                        wire:model="nama" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" 
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
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" 
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
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" 
                        readonly />
                    @error('jenis_pelanggan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Spesifikasi Meter -->
                <div>
                    <label for="spesifikasi_meter" class="block text-sm font-medium text-gray-700 mb-1">
                        Spesifikasi Meter (Diameter)
                    </label>
                    <select id="spesifikasi_meter" 
                        wire:model="spesifikasi_meter" 
                        wire:change="hitungBiayaPasang" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 select2">
                        <option value="">Pilih Diameter</option>
                        @foreach($diameterOptions as $diameter)
                            <option value="{{ $diameter }}">{{ $diameter }}</option>
                        @endforeach
                    </select>
                    @error('spesifikasi_meter') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Jumlah Biaya Pasang -->
                <div>
                    <label for="jumlah_biaya_pasang" class="block text-sm font-medium text-gray-700 mb-1">
                        Jumlah Biaya Pasang
                    </label>
                    <input type="text" 
                        id="jumlah_biaya_pasang" 
                        wire:model="jumlah_biaya_pasang" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" 
                        readonly />
                    @error('jumlah_biaya_pasang') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
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
                    class="px-4 py-2 bg-blue-500 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" style="display: block;">
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