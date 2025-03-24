<div class="bg-white rounded-xl shadow-sm mx-6 my-3">
    <!-- Layout Utama -->
    <div class="p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">Formulir Input Master SKPS</h2>
        
        <!-- Form -->
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Pilih Kecamatan -->
                <div>
                    <label for="kecamatan" class="block text-sm font-medium text-gray-700 mb-1">
                        Pilih Kecamatan
                    </label>
                    <select id="kecamatan" 
                        wire:model="kecamatan" 
                        wire:change="loadDesa" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 select2">
                        <option value="">Pilih Kecamatan</option>
                        @foreach($kecamatanList as $kecamatan)
                            <option value="{{ $kecamatan['id'] }}">{{ $kecamatan['nama'] }}</option>
                        @endforeach
                    </select>
                    @error('kecamatan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Pilihan Desa -->
                <div>
                    <label for="desa" class="block text-sm font-medium text-gray-700 mb-1">
                        Pilihan Desa
                    </label>
                    <select id="desa" 
                        wire:model="desa" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 select2">
                        <option value="">Pilih Desa</option>
                        @foreach($desaList as $desa)
                            <option value="{{ $desa['id'] }}">{{ $desa['nama'] }}</option>
                        @endforeach
                    </select>
                    @error('desa') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Kecamatan -->
                <div>
                    <label for="kecamatan_input" class="block text-sm font-medium text-gray-700 mb-1">
                        Kecamatan
                    </label>
                    <input type="text" 
                        id="kecamatan_input" 
                        wire:model="kecamatan_input" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        readonly />
                    @error('kecamatan_input') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Desa -->
                <div>
                    <label for="desa_input" class="block text-sm font-medium text-gray-700 mb-1">
                        Desa
                    </label>
                    <input type="text" 
                        id="desa_input" 
                        wire:model="desa_input" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        readonly />
                    @error('desa_input') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Alamat -->
                <div class="md:col-span-2">
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">
                        Alamat <span class="text-gray-500">(alamat-zona-unit)</span>
                    </label>
                    <select id="alamat" 
                        wire:model="alamat" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 select2">
                        <option value="">Pilih Alamat</option>
                        @foreach($alamatList as $alamat)
                            <option value="{{ $alamat['id'] }}">{{ $alamat['nama'] }}</option>
                        @endforeach
                    </select>
                    @error('alamat') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Jenis Pelanggan -->
                <div>
                    <label for="jenis_pelanggan" class="block text-sm font-medium text-gray-700 mb-1">
                        Jenis Pelanggan
                    </label>
                    <select id="jenis_pelanggan" 
                        wire:model="jenis_pelanggan" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 select2">
                        <option value="">Pilih Jenis Pelanggan</option>
                        <option value="rumah_tangga">Rumah Tangga</option>
                        <option value="niaga_kecil">Niaga Kecil</option>
                        <option value="niaga_besar">Niaga Besar</option>
                        <option value="industri">Industri</option>
                    </select>
                    @error('jenis_pelanggan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- NO SPKS -->
                <div>
                    <label for="no_spks" class="block text-sm font-medium text-gray-700 mb-1">
                        NO SPKS
                    </label>
                    <input type="text" 
                        id="no_spks" 
                        wire:model="no_spks" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        required />
                    @error('no_spks') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- NO SR -->
                <div>
                    <label for="no_sr" class="block text-sm font-medium text-gray-700 mb-1">
                        NO SR
                    </label>
                    <input type="text" 
                        id="no_sr" 
                        wire:model="no_sr" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        required />
                    @error('no_sr') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Nama SPKS -->
                <div>
                    <label for="nama_spks" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama SPKS
                    </label>
                    <input type="text" 
                        id="nama_spks" 
                        wire:model="nama_spks" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        required />
                    @error('nama_spks') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Kuota -->
                <div>
                    <label for="kuota" class="block text-sm font-medium text-gray-700 mb-1">
                        Kuota
                    </label>
                    <input type="number" 
                        id="kuota" 
                        wire:model="kuota" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        required />
                    @error('kuota') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Biaya -->
                <div>
                    <label for="biaya" class="block text-sm font-medium text-gray-700 mb-1">
                        Biaya
                    </label>
                    <input type="number" 
                        id="biaya" 
                        wire:model="biaya" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        required />
                    @error('biaya') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Keterangan -->
                <div class="md:col-span-2">
                    <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-1">
                        Keterangan
                    </label>
                    <textarea 
                        id="keterangan" 
                        wire:model="keterangan" 
                        rows="3" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500"></textarea>
                    @error('keterangan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
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