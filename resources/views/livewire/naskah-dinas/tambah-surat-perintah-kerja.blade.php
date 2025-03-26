<div class="bg-white rounded-xl shadow-sm mx-6 my-3">
    <div class="p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">Formulir Surat Perintah Kerja</h2>
        
        @if (session('message'))
            <div class="mb-4 px-4 py-2 rounded-md {{ session('message.type') === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                {{ session('message.text') }}
            </div>
        @endif

        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nomor Surat -->
                <div>
                    <label for="nomor_surat" class="block text-sm font-medium text-gray-700 mb-1">
                        Nomor Surat <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                        id="nomor_surat" 
                        wire:model="nomor_surat" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-600 focus:border-indigo-600" 
                        required
                        placeholder="Contoh: SPK/001/IX/2023" />
                    @error('nomor_surat') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Tanggal Surat -->
                <div>
                    <label for="tanggal_surat" class="block text-sm font-medium text-gray-700 mb-1">
                        Tanggal Surat <span class="text-red-500">*</span>
                    </label>
                    <input type="date" 
                        id="tanggal_surat" 
                        wire:model="tanggal_surat" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-600 focus:border-indigo-600" 
                        required />
                    @error('tanggal_surat') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Kepada (Vendor) -->
                <div>
                    <label for="kepada" class="block text-sm font-medium text-gray-700 mb-1">
                        Kepada (Vendor) <span class="text-red-500">*</span>
                    </label>
                    <select id="kepada" 
                        wire:model="kepada" 
                        wire:change="loadVendorData" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-600 focus:border-indigo-600 select2">
                        <option value="">Pilih Vendor</option>
                        @foreach($vendorList as $vendor)
                            <option value="{{ $vendor['id'] }}">{{ $vendor['nama_vendor'] }}</option>
                        @endforeach
                    </select>
                    @error('kepada') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Alamat Vendor -->
                <div>
                    <label for="alamat_vendor" class="block text-sm font-medium text-gray-700 mb-1">
                        Alamat Vendor
                    </label>
                    <input type="text" 
                        id="alamat_vendor" 
                        wire:model="alamat_vendor" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-600 focus:border-indigo-600 bg-gray-50" 
                        readonly />
                    @error('alamat_vendor') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Perihal -->
                <div>
                    <label for="perihal" class="block text-sm font-medium text-gray-700 mb-1">
                        Perihal <span class="text-red-500">*</span>
                    </label>
                    <select id="perihal" 
                        wire:model="perihal" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-600 focus:border-indigo-600 select2">
                        <option value="">Pilih Perihal</option>
                        <option value="pemasangan_sambungan_baru">Pemasangan Sambungan Baru</option>
                        <option value="pemeliharaan_sambungan">Pemeliharaan Sambungan</option>
                        <option value="perbaikan_meter">Perbaikan Meter</option>
                    </select>
                    @error('perihal') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Nomor Permohonan -->
                <div>
                    <label for="nomor_permohonan" class="block text-sm font-medium text-gray-700 mb-1">
                        Nomor Permohonan <span class="text-red-500">*</span>
                    </label>
                    <select id="nomor_permohonan" 
                        wire:model="nomor_permohonan" 
                        wire:change="loadPelangganData" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-600 focus:border-indigo-600 select2">
                        <option value="">Pilih Nomor Permohonan</option>
                        @foreach($permohonanList as $permohonan)
                            <option value="{{ $permohonan['id'] }}">{{ $permohonan['id'] }}</option>
                        @endforeach
                    </select>
                    @error('nomor_permohonan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Auto-filled fields from permohonan -->
                <div>
                    <label for="nama_pemohon" class="block text-sm font-medium text-gray-700 mb-1">
                        Nama Pemohon
                    </label>
                    <input type="text" 
                        id="nama_pemohon" 
                        wire:model="nama_pemohon" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-600 focus:border-indigo-600 bg-gray-50" 
                        readonly />
                </div>

                <div>
                    <label for="alamat_pemohon" class="block text-sm font-medium text-gray-700 mb-1">
                        Alamat Pemohon
                    </label>
                    <input type="text" 
                        id="alamat_pemohon" 
                        wire:model="alamat_pemohon" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-600 focus:border-indigo-600 bg-gray-50" 
                        readonly />
                </div>

                <div>
                    <label for="nomor_telp_pemohon" class="block text-sm font-medium text-gray-700 mb-1">
                        Nomor Telp Pemohon
                    </label>
                    <input type="text" 
                        id="nomor_telp_pemohon" 
                        wire:model="nomor_telp_pemohon" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-600 focus:border-indigo-600 bg-gray-50" 
                        readonly />
                </div>

                <div>
                    <label for="titik_koordinat" class="block text-sm font-medium text-gray-700 mb-1">
                        Titik Koordinat
                    </label>
                    <input type="text" 
                        id="titik_koordinat" 
                        wire:model="titik_koordinat" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-600 focus:border-indigo-600 bg-gray-50" 
                        readonly />
                </div>

                <!-- Waktu Kerja -->
                <div>
                    <label for="waktu_kerja" class="block text-sm font-medium text-gray-700 mb-1">
                        Waktu Kerja (Hari) <span class="text-red-500">*</span>
                    </label>
                    <input type="number" 
                    id="waktu_kerja" 
                    wire:model="waktu_kerja" 
                    class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-600 focus:border-indigo-600" 
                    required
                    min="1"
                    placeholder="Jumlah hari kerja" />
                    @error('waktu_kerja') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Masa Kerja -->
                <div>
                    <label for="masa_kerja" class="block text-sm font-medium text-gray-700 mb-1">
                        Masa Kerja
                    </label>
                    <input type="text" 
                        id="masa_kerja" 
                        wire:model="masa_kerja" 
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-600 focus:border-indigo-600 bg-gray-50" 
                        readonly />
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
                        class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-indigo-600 focus:border-indigo-600"
                        placeholder="Tambahkan keterangan jika diperlukan"></textarea>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="mt-8 flex justify-end space-x-4">
                <button type="button" 
                    wire:click="resetForm" 
                    class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Reset
                </button>
                
                <button type="submit" 
                    class="px-4 py-2 bg-blue-500 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Buat Draft SPK
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        // Initialize Select2
        $('.select2').select2({
            placeholder: 'Pilih opsi',
            allowClear: true,
            width: '100%'
        });

        // Livewire hook for Select2 changes
        $('.select2').on('change', function (e) {
            let fieldName = $(this).attr('wire:model');
            @this.set(fieldName, $(this).val());
        });

        // Refresh Select2 when Livewire updates
        Livewire.hook('message.processed', (message, component) => {
            $('.select2').select2({
                placeholder: 'Pilih opsi',
                allowClear: true,
                width: '100%'
            });
        });
    });
</script>
@endpush