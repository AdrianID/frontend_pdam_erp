<div class="bg-white rounded-xl shadow-sm mx-6 my-3">
    <div class="p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">Formulir Daftar Vendor</h2>
        
        <!-- Success Notification -->
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-700 rounded-md">
                <div class="flex items-center">
                    <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ session('success') }}
                </div>
            </div>
        @endif
        
        <!-- Error Notification -->
        @if(session('error'))
            <div class="mb-4 p-4 bg-red-100 border border-red-200 text-red-700 rounded-md">
                <div class="flex items-center">
                    <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    {{ session('error') }}
                </div>
            </div>
        @endif
        
        <!-- Upload Error Notification -->
        @if($uploadError)
            <div class="mb-4 p-4 bg-red-100 border border-red-200 text-red-700 rounded-md">
                <div class="flex items-center">
                    <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    {{ $uploadError }}
                </div>
            </div>
        @endif

        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Jenis Vendor -->
                <div>
                    <label for="jenis_vendor" class="block text-sm font-medium text-gray-700 mb-1">
                        Jenis Vendor <span class="text-red-500">*</span>
                    </label>
                    <select id="jenis_vendor" 
                        wire:model="jenis_vendor" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
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
                        Nama Vendor <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                        id="nama_vendor" 
                        wire:model="nama_vendor" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" />
                    @error('nama_vendor') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Alamat -->
                <div class="md:col-span-2">
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">
                        Alamat <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                        id="alamat" 
                        wire:model="alamat" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" />
                    @error('alamat') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Nomor Telp -->
                <div>
                    <label for="nomor_telp" class="block text-sm font-medium text-gray-700 mb-1">
                        Nomor Telepon <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                        id="nomor_telp" 
                        wire:model="nomor_telp" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" />
                    @error('nomor_telp') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        Email
                    </label>
                    <input type="email" 
                        id="email" 
                        wire:model="email" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" />
                    @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Nomor Surat Perjanjian -->
                <div>
                    <label for="nomor_surat_perjanjian" class="block text-sm font-medium text-gray-700 mb-1">
                        Nomor Surat Perjanjian <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                        id="nomor_surat_perjanjian" 
                        wire:model="nomor_surat_perjanjian" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" />
                    @error('nomor_surat_perjanjian') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Tanggal Surat Perjanjian -->
                <div>
                    <label for="tanggal_surat_perjanjian" class="block text-sm font-medium text-gray-700 mb-1">
                        Tanggal Surat Perjanjian <span class="text-red-500">*</span>
                    </label>
                    <input type="date" 
                        id="tanggal_surat_perjanjian" 
                        wire:model="tanggal_surat_perjanjian" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" />
                    @error('tanggal_surat_perjanjian') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                {{-- <div class="md:col-span-2">
                    <label for="file_surat_perjanjian" class="block text-sm font-medium text-gray-700 mb-1">
                        File Surat Perjanjian (PDF/DOC/DOCX, max 5MB) <span class="text-red-500">*</span>
                    </label>
                    
                    <div class="flex items-center">
                        <input type="file" 
                            id="file_surat_perjanjian" 
                            wire:model="file_surat_perjanjian"
                            accept=".pdf,.doc,.docx"
                            class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" />
                        
                        <div wire:loading wire:target="file_surat_perjanjian" class="ml-3">
                            <svg class="animate-spin h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    @error('file_surat_perjanjian') 
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span> 
                    @enderror
                    
                    @if($file_surat_perjanjian)
                        <div class="mt-2 p-2 bg-gray-50 rounded-md">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                <span class="ml-2 text-sm text-gray-600">
                                    {{ $file_surat_perjanjian->getClientOriginalName() }}
                                    ({{ round($file_surat_perjanjian->getSize()/1024, 2) }} KB)
                                </span>
                            </div>
                            <p class="mt-1 text-xs text-gray-500">
                                File akan disimpan permanen setelah Anda menekan tombol Submit
                            </p>
                        </div>
                    @endif
                </div> --}}

                <!-- Tanggal Bergabung -->
                <div>
                    <label for="tanggal_bergabung" class="block text-sm font-medium text-gray-700 mb-1">
                        Tanggal Bergabung
                    </label>
                    <input type="date" 
                        id="tanggal_bergabung" 
                        wire:model="tanggal_bergabung" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500" />
                    @error('tanggal_bergabung') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <select id="status" 
                        wire:model="status" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                        <option value="aktif">Aktif</option>
                        <option value="tidak_aktif">Tidak Aktif</option>
                    </select>
                    @error('status') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Rating -->
                <div>
                    <label for="rating" class="block text-sm font-medium text-gray-700 mb-1">
                        Rating <span class="text-red-500">*</span>
                    </label>
                    <select id="rating" 
                        wire:model="rating" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                        <option value="1">1 (Buruk)</option>
                        <option value="2">2 (Cukup)</option>
                        <option value="3">3 (Baik)</option>
                        <option value="4">4 (Sangat Baik)</option>
                        <option value="5" selected>5 (Luar Biasa)</option>
                    </select>
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
                <button type="button" 
                    wire:click="resetForm" 
                    class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Reset
                </button>
                
                <button type="submit" 
                    wire:click="save"
                    wire:loading.attr="disabled"
                    wire:loading.class="opacity-50 cursor-not-allowed"
                    wire:target="save"
                    class="relative px-4 py-2 bg-blue-500 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Simpan
                    <span wire:loading wire:target="save" class="absolute inset-0 flex items-center justify-center">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>