<div class="bg-white rounded-xl shadow-sm mx-6 my-3">
    <!-- Top App Bar -->
    <div class="border-b border-gray-200 sticky top-0 z-10 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <button onclick="history.back()" class="mr-4 w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-100 transition-colors">
                        <i class="fas fa-arrow-left text-gray-700"></i>
                    </button>
                    <h1 class="text-lg font-medium text-gray-800">{{ isset($customer) ? 'Edit Pelanggan' : 'Tambah Pelanggan Baru' }}</h1>
                </div>
                
                <!-- Form Actions -->
                <div class="flex items-center space-x-3">
                    <button type="button" wire:click="cancel" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                        Batal
                    </button>
                    <button type="button" wire:click="save" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors flex items-center">
                        <i class="fas fa-save mr-2"></i>
                        <span>{{ isset($customer) ? 'Simpan Perubahan' : 'Simpan' }}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Content -->
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">
        <form wire:submit.prevent="save">
            <!-- Form Sections Grid -->
            <div class="">
                <!-- Left Column (2/3 width on large screens) -->
                <div class="lg:col-span-2 space-y-8">

                     <!-- Informasi Pelanggan Card -->
                     <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 mr-4">
                                    <i class="fas fa-water"></i>
                                </div>
                                <h2 class="text-lg font-medium text-gray-800">Informasi Pelanggan</h2>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-4">
                                <!-- Pilih Kecamatan -->
                                <div>
                                    <label for="kecamatan" class="block text-sm font-medium text-gray-700 mb-1">
                                        Pilih Kecamatan
                                    </label>
                                    <select id="kecamatan" 
                                        wire:model="kecamatan" 
                                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 select2">
                                        <option value="">Pilih Kecamatan</option>
                                        {{-- @foreach($kecamatanOptions as $option)
                                            <option value="{{ $option->id }}">{{ $option->nama }}</option>
                                        @endforeach --}}
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
                                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 select2">
                                        <option value="">Pilih Desa</option>
                                        {{-- @foreach($desaOptions as $option)
                                            <option value="{{ $option->id }}">{{ $option->nama }}</option>
                                        @endforeach --}}
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
                                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" />
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
                                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" />
                                    @error('desa_input') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                                
                                <!-- Alamat -->
                                <div class="md:col-span-2">
                                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">
                                        Alamat <span class="text-gray-500">(alamat-zona-unit)</span>
                                    </label>
                                    <select id="alamat" 
                                        wire:model="alamat" 
                                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 select2">
                                        <option value="">Pilih Alamat</option>
                                        {{-- @foreach($alamatOptions as $option)
                                            <option value="{{ $option->id }}">{{ $option->nama }}</option>
                                        @endforeach --}}
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
                                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 select2">
                                        <option value="">Pilih Jenis Pelanggan</option>
                                        {{-- @foreach($jenisPelangganOptions as $option)
                                            <option value="{{ $option->id }}">{{ $option->nama }}</option>
                                        @endforeach --}}
                                    </select>
                                    @error('jenis_pelanggan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                                
                                <!-- Kelompok (Jenis Sambungan) -->
                                <div>
                                    <label for="kelompok" class="block text-sm font-medium text-gray-700 mb-1">
                                        Kelompok (Jenis Sambungan)
                                    </label>
                                    <select id="kelompok" 
                                        wire:model="kelompok" 
                                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 select2">
                                        <option value="">Pilih Kelompok</option>
                                        {{-- @foreach($kelompokOptions as $option)
                                            <option value="{{ $option->id }}">{{ $option->nama }}</option>
                                        @endforeach --}}
                                    </select>
                                    @error('kelompok') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Detail Pemohon Card -->
                    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 mr-4">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                                <h2 class="text-lg font-medium text-gray-800">Detail Pemohon</h2>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-4">
                                <!-- NIK -->
                                <div>
                                    <label for="nik" class="block text-sm font-medium text-gray-700 mb-1">
                                        NIK
                                    </label>
                                    <input type="text" 
                                        id="nik" 
                                        wire:model="nik" 
                                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" 
                                        required />
                                    @error('nik') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>

                                <!-- Nama Lengkap -->
                                <div class="md:col-span-2">
                                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-1">
                                        Nama Lengkap <span class="text-gray-500">(tanpa petik)</span>
                                    </label>
                                    <input type="text" 
                                        id="nama_lengkap" 
                                        wire:model="nama_lengkap" 
                                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" 
                                        required />
                                    @error('nama_lengkap') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                                
                                <!-- Pekerjaan -->
                                <div>
                                    <label for="pekerjaan" class="block text-sm font-medium text-gray-700 mb-1">
                                        Pekerjaan
                                    </label>
                                    <input type="text" 
                                        id="pekerjaan" 
                                        wire:model="pekerjaan" 
                                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" />
                                    @error('pekerjaan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                                
                                <!-- RT/RW/No. Rumah -->
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        RT/RW/No. Rumah
                                    </label>
                                    <div class="grid grid-cols-3 gap-4">
                                        <input type="text" 
                                            id="rt" 
                                            wire:model="rt" 
                                            class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" 
                                            placeholder="RT" />
                                        <input type="text" 
                                            id="rw" 
                                            wire:model="rw" 
                                            class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" 
                                            placeholder="RW" />
                                        <input type="text" 
                                            id="no_rumah" 
                                            wire:model="no_rumah" 
                                            class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" 
                                            placeholder="No. Rumah" />
                                    </div>
                                    @error('rt') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                    @error('rw') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                    @error('no_rumah') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                                
                                <!-- Gang / Blok -->
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        Gang / Blok
                                    </label>
                                    <div class="grid grid-cols-2 gap-4">
                                        <input type="text" 
                                            id="gang" 
                                            wire:model="gang" 
                                            class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" 
                                            placeholder="Gang" />
                                        <input type="text" 
                                            id="blok" 
                                            wire:model="blok" 
                                            class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" 
                                            placeholder="Blok" />
                                    </div>
                                    @error('gang') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                    @error('blok') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                                
                                <!-- Luas Bangunan -->
                                <div>
                                    <label for="luas_bangunan" class="block text-sm font-medium text-gray-700 mb-1">
                                        Luas Bangunan
                                    </label>
                                    <select id="luas_bangunan" 
                                        wire:model="luas_bangunan" 
                                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 select2">
                                        <option value="">Pilih Luas Bangunan</option>
                                        {{-- @foreach($luasBangunanOptions as $option)
                                            <option value="{{ $option->id }}">{{ $option->nama }}</option>
                                        @endforeach --}}
                                    </select>
                                    @error('luas_bangunan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                                
                                <!-- Jenis Hunian -->
                                <div>
                                    <label for="jenis_hunian" class="block text-sm font-medium text-gray-700 mb-1">
                                        Jenis Hunian
                                    </label>
                                    <select id="jenis_hunian" 
                                        wire:model="jenis_hunian" 
                                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 select2">
                                        <option value="">Pilih Jenis Hunian</option>
                                        {{-- @foreach($jenisHunianOptions as $option)
                                            <option value="{{ $option->id }}">{{ $option->nama }}</option>
                                        @endforeach --}}
                                    </select>
                                    @error('jenis_hunian') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                                
                                <!-- Status Kepemilikan -->
                                <div>
                                    <label for="status_kepemilikan" class="block text-sm font-medium text-gray-700 mb-1">
                                        Status Kepemilikan
                                    </label>
                                    <select id="status_kepemilikan" 
                                        wire:model="status_kepemilikan" 
                                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 select2">
                                        <option value="">Pilih Status Kepemilikan</option>
                                        {{-- @foreach($statusKepemilikanOptions as $option)
                                            <option value="{{ $option->id }}">{{ $option->nama }}</option>
                                        @endforeach --}}
                                    </select>
                                    @error('status_kepemilikan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                                
                                <!-- Kebutuhan Air Sebelumnya -->
                                <div>
                                    <label for="kebutuhan_air_sebelumnya" class="block text-sm font-medium text-gray-700 mb-1">
                                        Kebutuhan Air Sebelumnya
                                    </label>
                                    <select id="kebutuhan_air_sebelumnya" 
                                        wire:model="kebutuhan_air_sebelumnya" 
                                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 select2">
                                        <option value="">Pilih Kebutuhan Air Sebelumnya</option>
                                        {{-- @foreach($kebutuhanAirOptions as $option)
                                            <option value="{{ $option->id }}">{{ $option->nama }}</option>
                                        @endforeach --}}
                                    </select>
                                    @error('kebutuhan_air_sebelumnya') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                                
                                <!-- Kran Diminta -->
                                <div>
                                    <label for="kran_diminta" class="block text-sm font-medium text-gray-700 mb-1">
                                        Kran Diminta
                                    </label>
                                    <input type="text" 
                                        id="kran_diminta" 
                                        wire:model="kran_diminta" 
                                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" />
                                    @error('kran_diminta') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                                
                                <!-- KWh PLN -->
                                <div>
                                    <label for="kwh_pln" class="block text-sm font-medium text-gray-700 mb-1">
                                        KWh PLN
                                    </label>
                                    <select id="kwh_pln" 
                                        wire:model="kwh_pln" 
                                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 select2">
                                        <option value="">Pilih KWh PLN</option>
                                        {{-- @foreach($kwhPlnOptions as $option)
                                            <option value="{{ $option->id }}">{{ $option->nama }}</option>
                                        @endforeach --}}
                                    </select>
                                    @error('kwh_pln') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                                
                                <!-- Kelengkapan Dokumen -->
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">
                                        Kelengkapan Dokumen
                                    </label>
                                    <div class="flex space-x-4">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" 
                                                wire:model="dokumen_ktp" 
                                                class="form-checkbox h-4 w-4 text-blue-600" />
                                            <span class="ml-2 text-sm text-gray-700">KTP</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" 
                                                wire:model="dokumen_kk" 
                                                class="form-checkbox h-4 w-4 text-blue-600" />
                                            <span class="ml-2 text-sm text-gray-700">KK</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" 
                                                wire:model="dokumen_pbb" 
                                                class="form-checkbox h-4 w-4 text-blue-600" />
                                            <span class="ml-2 text-sm text-gray-700">Surat PBB</span>
                                        </label>
                                    </div>
                                    @error('dokumen_ktp') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                    @error('dokumen_kk') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                    @error('dokumen_pbb') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                                
                                <!-- No. Telepon -->
                                <div>
                                    <label for="no_telepon" class="block text-sm font-medium text-gray-700 mb-1">
                                        No. Telepon <span class="text-gray-500">(hanya angka)</span>
                                    </label>
                                    <input type="text" 
                                        id="no_telepon" 
                                        wire:model="no_telepon" 
                                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" 
                                        pattern="\d*" />
                                    @error('no_telepon') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- New Location Card -->
                    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center text-amber-600 mr-4">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <h2 class="text-lg font-medium text-gray-800">Lokasi</h2>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <!-- Map Container -->
                            <div class="h-[300px] bg-gray-100 rounded-lg mb-6 relative" id="map">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <p class="text-gray-500">Pilih lokasi pada peta</p>
                                </div>
                            </div>
                            
                            <!-- Coordinates Input -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-4">
                                <!-- Latitude -->
                                <div>
                                    <label for="latitude" class="block text-sm font-medium text-gray-700 mb-1">
                                        Latitude
                                    </label>
                                    <input type="text" 
                                        id="latitude" 
                                        wire:model="latitude" 
                                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" />
                                    @error('latitude') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                                
                                <!-- Longitude -->
                                <div>
                                    <label for="longitude" class="block text-sm font-medium text-gray-700 mb-1">
                                        Longitude
                                    </label>
                                    <input type="text" 
                                        id="longitude" 
                                        wire:model="longitude" 
                                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" />
                                    @error('longitude') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
    
            <!-- Tombol Aksi -->
            <div class="mt-8 flex justify-start space-x-4">
                <!-- Reset Button -->
                <button type="button" 
                    wire:click="resetForm" 
                    class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Reset
                </button>
                
                <!-- Simpan Button -->
                <button type="submit" 
                    class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById('map') && typeof google !== 'undefined' && google.maps) {
        const initialLat = {{ $latitude ?? -8.5 }};
        const initialLng = {{ $longitude ?? 115.2 }};
        
        const mapOptions = {
            center: { lat: initialLat, lng: initialLng },
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: false,
            streetViewControl: false,
            fullscreenControl: true,
        };
        
        const map = new google.maps.Map(document.getElementById('map'), mapOptions);
        
        let marker = new google.maps.Marker({
            position: { lat: initialLat, lng: initialLng },
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP,
        });
        
        google.maps.event.addListener(marker, 'dragend', function() {
            const position = marker.getPosition();
            @this.set('latitude', position.lat());
            @this.set('longitude', position.lng());
        });
        
        google.maps.event.addListener(map, 'click', function(event) {
            marker.setPosition(event.latLng);
            @this.set('latitude', event.latLng.lat());
            @this.set('longitude', event.latLng.lng());
        });
        
        const searchInput = document.getElementById('search_location');
        const searchBox = new google.maps.places.SearchBox(searchInput);
        
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });
        
        searchBox.addListener('places_changed', function() {
            const places = searchBox.getPlaces();
            if (places.length === 0) {
                return;
            }
            
            const bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry || !place.geometry.location) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                
                marker.setPosition(place.geometry.location);
                @this.set('latitude', place.geometry.location.lat());
                @this.set('longitude', place.geometry.location.lng());
                
                if (place.geometry.viewport) {
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            
            map.fitBounds(bounds);
        });
        
        window.addEventListener('refreshMap', event => {
            const lat = event.detail.latitude || initialLat;
            const lng = event.detail.longitude || initialLng;
            const position = new google.maps.LatLng(lat, lng);
            
            marker.setPosition(position);
            map.setCenter(position);
        });
    }
});
</script>
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
@endpush 