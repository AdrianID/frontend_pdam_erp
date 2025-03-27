<div class="bg-white rounded-xl shadow-sm mx-6 my-3">
    <!-- Top App Bar -->
    <div class="border-b border-gray-200 sticky top-0 z-10 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <button onclick="history.back()" class="mr-4 w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-100 transition-colors">
                        <i class="fas fa-arrow-left text-gray-700"></i>
                    </button>
                    <h1 class="text-lg font-medium text-gray-800">{{ isset($pelanggan) ? 'Edit Pelanggan' : 'Tambah Pelanggan Baru' }}</h1>
                </div>
                
                {{-- <div class="flex items-center space-x-3">
                    <button type="button" wire:click="cancel" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                        Batal
                    </button>
                    <button type="button" wire:click="save" wire:loading.attr="disabled" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors flex items-center">
                        <i class="fas fa-save mr-2"></i>
                        <span wire:loading.remove>{{ isset($pelanggan) ? 'Simpan Perubahan' : 'Simpan' }}</span>
                        <span wire:loading>Menyimpan...</span>
                    </button>
                </div> --}}
            </div>
        </div>
    </div>

    <!-- Form Content -->
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">

        <form wire:submit.prevent="save">
            <!-- Informasi Pelanggan Card -->

            <!-- Password Section - Hanya ditampilkan saat tambah baru -->
            @if(!isset($customer))
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm mb-8">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h2 class="text-lg font-medium text-gray-800">Buat Akun</h2>
                </div>
                <div class="p-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" id="name" wire:model="name" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" required />
                        @error('name') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                        <input type="text" id="username" wire:model="username" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" required />
                        @error('username') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" wire:model="email" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" required />
                        @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                            Password
                        </label>
                        <input type="password" id="password" wire:model="password" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" required />
                        @error('password') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                            Konfirmasi Password
                        </label>
                        <input type="password" id="password_confirmation" wire:model="password_confirmation" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" required />
                        @error('password_confirmation') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            @else
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm mb-8">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <h2 class="text-lg font-medium text-gray-800">Ubah Akun (Opsional)</h2>
                </div>
                <div class="p-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name (Optional)</label>
                        <input type="text" id="name" wire:model="name" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" />
                        @error('name') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username (Optional)</label>
                        <input type="text" id="username" wire:model="username" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" />
                        @error('username') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email (Optional)</label>
                        <input type="email" id="email" wire:model="email" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" />
                        @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                            Password Baru (Opsional)
                        </label>
                        <input type="password" id="password" wire:model="password" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" />
                        @error('password') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                            Konfirmasi Password Baru
                        </label>
                        <input type="password" id="password_confirmation" wire:model="password_confirmation" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" />
                        @error('password_confirmation') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            @endif
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm mb-8">
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
                        <!-- Distrik -->
                        <div>
                            <label for="distrik_id" class="block text-sm font-medium text-gray-700 mb-1">Distrik</label>
                            <select id="distrik_id" wire:model="distrik_id" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                                <option value="">Pilih Distrik</option>
                                @foreach($distrikOptions as $option)
                                    <option value="{{ $option->id }}">{{ $option->nama }}</option>
                                @endforeach
                            </select>
                            @error('distrik_id') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Sub Area Distrik -->
                        <div>
                            <label for="sub_area_distrik_id" class="block text-sm font-medium text-gray-700 mb-1">Sub Area Distrik</label>
                            <select id="sub_area_distrik_id" wire:model="sub_area_distrik_id" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                                <option value="">Pilih Sub Area</option>
                                @foreach($subAreaDistrikOptions as $option)
                                    <option value="{{ $option->id }}">{{ $option->nama }}</option>
                                @endforeach
                            </select>
                            @error('sub_area_distrik_id') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Kecamatan -->
                        <div wire:ignore>
                            <label for="kecamatan_id" class="block text-sm font-medium text-gray-700 mb-1">Kecamatan</label>
                            <select id="kecamatan_id" wire:model="kecamatan_id" class="select2 block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                                <option value="">Pilih Kecamatan</option>
                                @foreach($kecamatanOptions as $option)
                                    <option value="{{ $option->id }}">{{ $option->nama_kecamatan }}</option>
                                @endforeach
                            </select>
                            @error('kecamatan_id') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Desa -->
                        <div wire:ignore>
                            <label for="desa_id" class="block text-sm font-medium text-gray-700 mb-1">Desa</label>
                            <select id="desa_id" wire:model="desa_id" class="select2 block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                                <option value="">Pilih Desa</option>
                                @foreach($desaOptions as $option)
                                    <option value="{{ $option->id }}">{{ $option->nama_desa }}</option>
                                @endforeach
                            </select>
                            @error('desa_id') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="md:col-span-2">
                            <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap</label>
                            <textarea id="alamat" wire:model="alamat" rows="3" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600"></textarea>
                            @error('alamat') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- RT/RW/No. Rumah -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">RT/RW/No. Rumah</label>
                            <div class="grid grid-cols-3 gap-4">
                                <div>
                                    <input type="text" id="rt" wire:model="rt" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" placeholder="RT" />
                                    @error('rt') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <input type="text" id="rw" wire:model="rw" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" placeholder="RW" />
                                    @error('rw') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <input type="text" id="no_rumah" wire:model="no_rumah" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" placeholder="No. Rumah" />
                                    @error('no_rumah') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Gang/Blok -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Gang/Blok</label>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <input type="text" id="gang" wire:model="gang" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" placeholder="Gang" />
                                    @error('gang') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <input type="text" id="blok" wire:model="blok" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" placeholder="Blok" />
                                    @error('blok') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail Pemohon Card -->
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm mb-8">
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
                            <label for="nik" class="block text-sm font-medium text-gray-700 mb-1">NIK</label>
                            <input type="text" id="nik" wire:model="nik" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" required />
                            @error('nik') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Nomor KK -->
                        <div>
                            <label for="nomor_kk" class="block text-sm font-medium text-gray-700 mb-1">Nomor KK</label>
                            <input type="text" id="nomor_kk" wire:model="nomor_kk" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" required />
                            @error('nomor_kk') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Nama Pelanggan -->
                        <div class="md:col-span-2">
                            <label for="nama_pelanggan" class="block text-sm font-medium text-gray-700 mb-1">Nama Pelanggan</label>
                            <input type="text" id="nama_pelanggan" wire:model="nama_pelanggan" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" required />
                            @error('nama_pelanggan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Pekerjaan -->
                        <div>
                            <label for="pekerjaan" class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan</label>
                            <input type="text" id="pekerjaan" wire:model="pekerjaan" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" />
                            @error('pekerjaan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- No. Telepon -->
                        <div>
                            <label for="no_telepon" class="block text-sm font-medium text-gray-700 mb-1">No. Telepon</label>
                            <input type="text" id="no_telepon" wire:model="no_telepon" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" />
                            @error('no_telepon') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Jenis Pelanggan -->
                        <div>
                            <label for="jenis_pelanggan" class="block text-sm font-medium text-gray-700 mb-1">Jenis Pelanggan</label>
                            <select id="jenis_pelanggan" wire:model="jenis_pelanggan" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                                <option value="">Pilih Jenis Pelanggan</option>
                                <option value="Rumah Tangga">Rumah Tangga</option>
                                <option value="Bisnis">Bisnis</option>
                                <option value="Industri">Industri</option>
                                <option value="Instansi">Instansi</option>
                            </select>
                            @error('jenis_pelanggan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Kelompok -->
                        <div>
                            <label for="kelompok" class="block text-sm font-medium text-gray-700 mb-1">Kelompok</label>
                            <select id="kelompok" wire:model="kelompok" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                                <option value="">Pilih Kelompok</option>
                                @foreach($kategoriOptions as $option)
                                    <option value="{{ $option->id }}">{{ $option->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('kelompok') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Luas Bangunan -->
                        <div>
                            <label for="luas_bangunan" class="block text-sm font-medium text-gray-700 mb-1">Luas Bangunan (m²)</label>
                            <select id="luas_bangunan" wire:model="luas_bangunan" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                                <option value="">Pilih Luas Bangunan</option>
                                @foreach($luasBangunanOptions as $option)
                                    <option value="{{ $option['id'] }}">{{ $option['nama'] }}</option>
                                @endforeach
                            </select>
                            @error('luas_bangunan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Jenis Hunian -->
                        <div>
                            <label for="jenis_hunian" class="block text-sm font-medium text-gray-700 mb-1">Jenis Hunian</label>
                            <select id="jenis_hunian" wire:model="jenis_hunian" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                                <option value="">Pilih Jenis Hunian</option>
                                @foreach($jenisHunianOptions as $option)
                                    <option value="{{ $option['nama'] }}">{{ $option['nama'] }}</option>
                                @endforeach
                            </select>
                            @error('jenis_hunian') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Status Kepemilikan -->
                        <div>
                            <label for="status_kepemilikan" class="block text-sm font-medium text-gray-700 mb-1">Status Kepemilikan</label>
                            <select id="status_kepemilikan" wire:model="status_kepemilikan" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                                <option value="">Pilih Status Kepemilikan</option>
                                @foreach($statusKepemilikanOptions as $option)
                                    <option value="{{ $option['nama'] }}">{{ $option['nama'] }}</option>
                                @endforeach
                            </select>
                            @error('status_kepemilikan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Kebutuhan Air Sebelumnya -->
                        <div>
                            <label for="kebutuhan_air_sebelumnya" class="block text-sm font-medium text-gray-700 mb-1">Kebutuhan Air Sebelumnya</label>
                            <select id="kebutuhan_air_sebelumnya" wire:model="kebutuhan_air_sebelumnya" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                                <option value="">Pilih Kebutuhan Air</option>
                                @foreach($kebutuhanAirOptions as $option)
                                    <option value="{{ $option['id'] }}">{{ $option['nama'] }}</option>
                                @endforeach
                            </select>
                            @error('kebutuhan_air_sebelumnya') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- KWh PLN -->
                        <div>
                            <label for="kwh_pln" class="block text-sm font-medium text-gray-700 mb-1">Daya Listrik (KWh PLN)</label>
                            <select id="kwh_pln" wire:model="kwh_pln" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                                <option value="">Pilih Daya Listrik</option>
                                @foreach($kwhPlnOptions as $option)
                                    <option value="{{ $option['nama'] }}">{{ $option['nama'] }}</option>
                                @endforeach
                            </select>
                            @error('kwh_pln') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>

                        <!-- Kran Diminta -->
                        <div>
                            <label for="kran_diminta" class="block text-sm font-medium text-gray-700 mb-1">Ukuran Kran Diminta</label>
                            <input type="text" id="kran_diminta" wire:model="kran_diminta" class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" placeholder="Contoh: 1/2 inch" />
                            @error('kran_diminta') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>

                        {{-- ... existing form fields ... --}}
                        {{-- <div class="form-group">
                            <label for="nomorPelanggan">Nomor Pelanggan</label>
                            <input type="text" class="form-control" id="nomorPelanggan" wire:model="nomorPelanggan" readonly>
                        </div> --}}

                        {{-- <div class="form-group">
                            <label for="nomorMeteran">Nomor Meteran</label>
                            <input type="text" class="form-control" id="nomorMeteran" wire:model="nomorMeteran" readonly>
                        </div> --}}
                        {{-- ... remaining form fields ... --}}
                    </div>
                </div>
            </div>

            <!-- Dokumen Card -->
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm mb-8">
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 mr-4">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <h2 class="text-lg font-medium text-gray-800">Dokumen Pendukung</h2>
                    </div>
                </div>
                
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Dokumen KTP -->
                        <div>
                            <label for="dokumen_ktp" class="block text-sm font-medium text-gray-700 mb-1">Upload KTP</label>
                            <input type="file" id="dokumen_ktp" wire:model="dokumen_ktp" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            @error('dokumen_ktp') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            @if($dokumen_ktp)
                                <div class="mt-1 text-sm text-gray-500">File: {{ $dokumen_ktp->getClientOriginalName() }}</div>
                            @endif
                        </div>

                        <!-- Dokumen KK -->
                        <div>
                            <label for="dokumen_kk" class="block text-sm font-medium text-gray-700 mb-1">Upload KK</label>
                            <input type="file" id="dokumen_kk" wire:model="dokumen_kk" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            @error('dokumen_kk') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            @if($dokumen_kk)
                                <div class="mt-1 text-sm text-gray-500">File: {{ $dokumen_kk->getClientOriginalName() }}</div>
                            @endif
                        </div>

                        <!-- Dokumen PBB -->
                        <div>
                            <label for="dokumen_pbb" class="block text-sm font-medium text-gray-700 mb-1">Upload Sertifikat/PBB</label>
                            <input type="file" id="dokumen_pbb" wire:model="dokumen_pbb" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            @error('dokumen_pbb') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                            @if($dokumen_pbb)
                                <div class="mt-1 text-sm text-gray-500">File: {{ $dokumen_pbb->getClientOriginalName() }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lokasi Card -->
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
                    <div class="h-[400px] w-full bg-gray-100 rounded-lg mb-6 relative" id="map">
                        <div class="absolute inset-0 flex items-center justify-center z-0" id="map-placeholder">
                            <p class="text-gray-500">Memuat peta...</p>
                        </div>
                    </div>
                    
                    <!-- Coordinates Input -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-4">
                        <!-- Latitude -->
                        <div>
                            <label for="latitude" class="block text-sm font-medium text-gray-700 mb-1">Latitude</label>
                            <input type="number" wire:model="latitude" step="0.00000001" min="-90" max="90" 
                                   class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" readonly />
                            @error('latitude') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>
                        
                        <!-- Longitude -->
                        <div>
                            <label for="longitude" class="block text-sm font-medium text-gray-700 mb-1">Longitude</label>
                            <input type="number" wire:model="longitude" step="0.00000001" min="-180" max="180" 
                                   class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" readonly />
                            @error('longitude') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>

            @if (session()->has('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6">
                    {{ session('error') }}
                </div>
            @elseif (session()->has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                    {{ session('success') }}
                </div>
            @endif
            <!-- Tombol Aksi -->
            <div class="mt-8 flex justify-end space-x-4">
                <!-- Reset Button -->
                <button type="button" wire:click="resetForm" class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Reset
                </button>
                
                <button type="submit" wire:loading.attr="disabled" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <span wire:loading.remove>{{ isset($pelanggan) ? 'Simpan Perubahan' : 'Simpan' }}</span>
                    <span wire:loading>Menyimpan...</span>
                </button>
                {{-- <button wire:click="saveDummyData" type="button" class="btn btn-secondary">
                    Simpan Data Dummy
                </button> --}}
            </div>
        </form>
    </div>
</div>

@push('scripts')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
document.addEventListener('livewire:init', function() {
    // Default coordinates (Jakarta)
    const defaultLat = {{ $latitude ?? -6.2088 }};
    const defaultLng = {{ $longitude ?? 106.8456 }};
    
    // Inisialisasi peta
    const map = L.map('map').setView([defaultLat, defaultLng], 15);
    
    // Tambahkan tile layer (OpenStreetMap)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    // Tambahkan marker
    const marker = L.marker([defaultLat, defaultLng], {
        draggable: true
    }).addTo(map);
    
    // Hapus placeholder setelah peta dimuat
    document.getElementById('map-placeholder').style.display = 'none';
    
    // Event ketika marker dipindahkan
    marker.on('dragend', function(e) {
        const position = marker.getLatLng();
        @this.set('latitude', position.lat);
        @this.set('longitude', position.lng);
    });
    
    // Event ketika peta diklik
    map.on('click', function(e) {
        marker.setLatLng(e.latlng);
        @this.set('latitude', e.latlng.lat);
        @this.set('longitude', e.latlng.lng);
    });
    
    // Livewire hook untuk update marker dari server
    Livewire.on('updateMarker', (data) => {
        const newLatLng = L.latLng(data.latitude, data.longitude);
        marker.setLatLng(newLatLng);
        map.setView(newLatLng);
    });

    marker.on('dragend', L.Util.throttle(function(e) {
    const position = marker.getLatLng();
    @this.call('updateMapPosition', position.lat, position.lng);
}, 200));
});
</script>
@endpush