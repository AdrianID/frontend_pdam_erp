<div class="bg-white rounded-xl shadow-sm mx-6 my-3">
    <form wire:submit.prevent="save">
        <!-- Form Sections Grid -->
        <div class="">
            <!-- Left Column (2/3 width on large screens) -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Informasi Barang Card -->
                <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm">
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 mr-4">
                                <i class="fas fa-box"></i>
                            </div>
                            <h2 class="text-lg font-medium text-gray-800">Menu Barang</h2>
                        </div>
                    </div>
                    
                    <div class="p-6 border-t-2 border-gray-300">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-4">
                            <!-- Nomor -->
                            <div>
                                <label for="nomor" class="block text-sm font-medium text-gray-700 mb-1">
                                    Nomor
                                </label>
                                <input type="text" 
                                    id="nomor" 
                                    wire:model="nomor" 
                                    class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" 
                                    readonly />
                                @error('nomor') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>
                            
                            <!-- Kode Barang -->
                            <div>
                                <label for="kode_barang" class="block text-sm font-medium text-gray-700 mb-1">
                                    Kode Barang
                                </label>
                                <input type="text" 
                                    id="kode_barang" 
                                    wire:model="kode_barang" 
                                    class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" 
                                    required />
                                @error('kode_barang') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>
                            
                            <!-- Nama Barang -->
                            <div class="md:col-span-2">
                                <label for="nama_barang" class="block text-sm font-medium text-gray-700 mb-1">
                                    Nama Barang
                                </label>
                                <input type="text" 
                                    id="nama_barang" 
                                    wire:model="nama_barang" 
                                    class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" 
                                    required />
                                @error('nama_barang') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>
                            
                            <!-- Kategori Barang -->
                            <div>
                                <label for="kategori_barang" class="block text-sm font-medium text-gray-700 mb-1">
                                    Kategori Barang
                                </label>
                                <select id="kategori_barang" 
                                    wire:model="kategori_barang" 
                                    class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 select2">
                                    <option value="">Pilih Kategori Barang</option>
                                    <option value="meteran">Meteran</option>
                                    <option value="pipa">Pipa</option>
                                    <option value="inventori_kantor">Inventori Kantor</option>
                                    <option value="bahan_kimia">Bahan Kimia</option>
                                </select>
                                @error('kategori_barang') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>
                            
                            <!-- Satuan -->
                            <div>
                                <label for="satuan" class="block text-sm font-medium text-gray-700 mb-1">
                                    Satuan
                                </label>
                                <select id="satuan" 
                                    wire:model="satuan" 
                                    class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 select2">
                                    <option value="">Pilih Satuan</option>
                                    <option value="pcs">Pcs</option>
                                    <option value="kg">Kg</option>
                                    <option value="meter">Meter</option>
                                    <option value="ton">Ton</option>
                                    <option value="lembar">Lembar</option>
                                </select>
                                @error('satuan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>
                            
                            <!-- Stok Minimal -->
                            <div>
                                <label for="stok_minimal" class="block text-sm font-medium text-gray-700 mb-1">
                                    Stok Minimal
                                </label>
                                <input type="number" 
                                    id="stok_minimal" 
                                    wire:model="stok_minimal" 
                                    class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" 
                                    required />
                                @error('stok_minimal') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>
                            
                            <!-- Stok Sekarang -->
                            <div>
                                <label for="stok_sekarang" class="block text-sm font-medium text-gray-700 mb-1">
                                    Stok Sekarang
                                </label>
                                <input type="number" 
                                    id="stok_sekarang" 
                                    wire:model="stok_sekarang" 
                                    class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" 
                                    required />
                                @error('stok_sekarang') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>
                            
                            <!-- Harga Satuan -->
                            <div>
                                <label for="harga_satuan" class="block text-sm font-medium text-gray-700 mb-1">
                                    Harga Satuan
                                </label>
                                <input type="number" 
                                    id="harga_satuan" 
                                    wire:model="harga_satuan" 
                                    class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" 
                                    required />
                                @error('harga_satuan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 flex justify-end p-6 space-x-6">
                        <!-- Reset Button -->
                        <button type="button" 
                            wire:click="resetForm" 
                            class="px-4 py-2 bg-gray-200 border border-gray-300 rounded-md text-sm font-medium text-gray-800 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-md transition duration-150 ease-in-out">
                            Reset
                        </button>
                        
                        <!-- Simpan Button -->
                        <button type="submit" 
                            class="px-4 py-2 bg-blue-500 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-md transition duration-150 ease-in-out">
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi -->
    </form>
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