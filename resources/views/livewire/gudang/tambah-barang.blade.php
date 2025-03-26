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
                            <!-- Kode Barang -->
                            <div class="md:col-span-2">
                                <label for="kode_barang" class="block text-sm font-medium text-gray-700 mb-1">
                                    Kode Barang <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                    id="kode_barang" 
                                    wire:model="kode_barang" 
                                    class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 @error('kode_barang') border-red-500 @enderror" 
                                    required />
                                @error('kode_barang') 
                                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> 
                                @enderror
                            </div>
                            
                            <!-- Nama Barang -->
                            <div class="md:col-span-2">
                                <label for="nama_barang" class="block text-sm font-medium text-gray-700 mb-1">
                                    Nama Barang <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                    id="nama_barang" 
                                    wire:model="nama_barang" 
                                    class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 @error('nama_barang') border-red-500 @enderror" 
                                    required />
                                @error('nama_barang') 
                                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> 
                                @enderror
                            </div>
                            
                            <!-- Deskripsi Barang -->
                            <div class="md:col-span-2">
                                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">
                                    Deskripsi Barang
                                </label>
                                <textarea id="deskripsi" 
                                    wire:model="deskripsi" 
                                    class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 @error('deskripsi') border-red-500 @enderror"
                                    placeholder="Masukkan deskripsi barang (opsional)"></textarea>
                                @error('deskripsi') 
                                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> 
                                @enderror
                            </div>
                            
                            <!-- Kategori Barang -->
                            <div>
                                <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">
                                    Kategori Barang <span class="text-red-500">*</span>
                                </label>
                                <select id="kategori" 
                                    wire:model="kategori" 
                                    class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 select2 @error('kategori') border-red-500 @enderror">
                                    <option value="">Pilih Kategori Barang</option>
                                    <option value="meteran">Meteran</option>
                                    <option value="pipa">Pipa</option>
                                    <option value="inventori_kantor">Inventori Kantor</option>
                                    <option value="bahan_kimia">Bahan Kimia</option>
                                </select>
                                @error('kategori') 
                                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> 
                                @enderror
                            </div>
                            
                            <!-- Satuan -->
                            <div>
                                <label for="satuan" class="block text-sm font-medium text-gray-700 mb-1">
                                    Satuan <span class="text-red-500">*</span>
                                </label>
                                <select id="satuan" 
                                    wire:model="satuan" 
                                    class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 select2 @error('satuan') border-red-500 @enderror">
                                    <option value="">Pilih Satuan</option>
                                    <option value="pcs">Pcs</option>
                                    <option value="kg">Kg</option>
                                    <option value="meter">Meter</option>
                                    <option value="ton">Ton</option>
                                    <option value="lembar">Lembar</option>
                                </select>
                                @error('satuan') 
                                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> 
                                @enderror
                            </div>
                            
                            <!-- Stok Minimal -->
                            <div>
                                <label for="stok_minimal" class="block text-sm font-medium text-gray-700 mb-1">
                                    Stok Minimal <span class="text-red-500">*</span>
                                </label>
                                <input type="number" 
                                    id="stok_minimal" 
                                    wire:model="stok_minimal" 
                                    min="0"
                                    class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 @error('stok_minimal') border-red-500 @enderror" 
                                    required />
                                @error('stok_minimal') 
                                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> 
                                @enderror
                            </div>
                            
                            <!-- Stok Sekarang -->
                            <div>
                                <label for="stok_tersedia" class="block text-sm font-medium text-gray-700 mb-1">
                                    Stok Sekarang <span class="text-red-500">*</span>
                                </label>
                                <input type="number" 
                                    id="stok_tersedia" 
                                    wire:model="stok_tersedia" 
                                    min="0"
                                    class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 @error('stok_tersedia') border-red-500 @enderror" 
                                    required />
                                @error('stok_tersedia') 
                                    <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> 
                                @enderror
                            </div>
                            
                            <!-- Harga Satuan -->
                            <div>
                                <label for="harga_satuan" class="block text-sm font-medium text-gray-700 mb-1">
                                    Harga Satuan <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="number"
                                    id="harga_satuan"
                                    wire:model="harga_satuan"
                                    min="0"
                                    max="9999999999.99"
                                    step="0.01"
                                    placeholder="0.00"
                                    class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 @error('harga_satuan') border-red-500 @enderror"
                                >
                                @error('harga_satuan')
                                    <span class="text-red-500 text-xs mt-1 block">
                                        @if($message == 'validation.max.numeric')
                                            Harga tidak boleh melebihi Rp 9.999.999.999,99
                                        @else
                                            {{ $message }}
                                        @endif
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Notification Area -->
                        @if($showSuccessNotification)
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                            Data barang berhasil disimpan!
                        </div>
                    @endif
                    
                    @if($showErrorNotification)
                        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                            {{ $errorMessage }}
                        </div>
                    @endif

                    <div class="mt-8 flex justify-end p-6 space-x-6">
                        <!-- Reset Button -->
                        <button type="button" 
                            wire:click="resetForm" 
                            class="px-4 py-2 bg-gray-200 border border-gray-300 rounded-md text-sm font-medium text-gray-800 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-md transition duration-150 ease-in-out">
                            Reset
                        </button>
                        
                        <!-- Simpan Button -->
                        <button type="submit" 
                            wire:loading.attr="disabled"
                            class="px-4 py-2 bg-blue-500 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-md transition duration-150 ease-in-out disabled:opacity-75">
                            <span wire:loading.remove>Simpan</span>
                            <span wire:loading>
                                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Menyimpan...
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
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
        
        // Refresh Select2 when Livewire updates
        Livewire.hook('message.processed', (message, component) => {
            $('.select2').select2({
                placeholder: 'Pilih opsi',
                allowClear: true
            });
        });
    });
</script>