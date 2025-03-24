<div class="bg-white rounded-xl shadow-sm mx-6 my-3">
    <!-- Layout Utama -->
    <div class="p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">Formulir Daftar Vendor</h2>
        
        <!-- Form -->
        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Jenis Vendor -->
                <div>
                    <label for="jenis_vendor" class="block text-sm font-medium text-gray-700 mb-1">
                        Jenis Vendor
                    </label>
                    <select id="jenis_vendor" 
                        wire:model="jenis_vendor" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 select2">
                        <option value="">Pilih Jenis Vendor</option>
                        <option value="jasa_pemasangan">Jasa Pemasangan</option>
                        <option value="jasa_perbaikan">Jasa Perbaikan</option>
                        <option value="pengadaan_barang">Pengadaan Barang</option>
                    </select>
                    @error('jenis_vendor') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Nama Vendor -->
                <div>
                    <label for="nama_vendor" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Vendor
                    </label>
                    <input type="text" 
                        id="nama_vendor" 
                        wire:model="nama_vendor" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        required />
                    @error('nama_vendor') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
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
                        required />
                    @error('alamat') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
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
                        required />
                    @error('nomor_telp') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Nomor Surat Perjanjian -->
                <div>
                    <label for="nomor_surat_perjanjian" class="block text-sm font-medium text-gray-700 mb-1">
                        Nomor Surat Perjanjian
                    </label>
                    <input type="text" 
                        id="nomor_surat_perjanjian" 
                        wire:model="nomor_surat_perjanjian" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        required />
                    @error('nomor_surat_perjanjian') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Tanggal Surat Perjanjian -->
                <div>
                    <label for="tanggal_surat_perjanjian" class="block text-sm font-medium text-gray-700 mb-1">
                        Tanggal Surat Perjanjian
                    </label>
                    <input type="date" 
                        id="tanggal_surat_perjanjian" 
                        wire:model="tanggal_surat_perjanjian" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        required />
                    @error('tanggal_surat_perjanjian') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- File Surat Perjanjian -->
                <div class="md:col-span-2">
                    <label for="file_surat_perjanjian" class="block text-sm font-medium text-gray-700 mb-1">
                        File Surat Perjanjian
                    </label>
                    <input type="file" 
                        id="file_surat_perjanjian" 
                        wire:model="file_surat_perjanjian" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        required />
                    @error('file_surat_perjanjian') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">
                        Status
                    </label>
                    <select id="status" 
                        wire:model="status" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 select2">
                        <option value="">Pilih Status</option>
                        <option value="aktif">Aktif</option>
                        <option value="tidak_aktif">Tidak Aktif</option>
                    </select>
                    @error('status') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Rating -->
                <div>
                    <label for="rating" class="block text-sm font-medium text-gray-700 mb-1">
                        Rating
                    </label>
                    <input type="number" 
                        id="rating" 
                        wire:model="rating" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" 
                        value="5" 
                        readonly />
                    @error('rating') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
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