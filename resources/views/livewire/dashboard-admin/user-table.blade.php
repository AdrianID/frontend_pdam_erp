<div>
    <div class="container mx-auto mt-10">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Customer Management</h3>
            <div class="overflow-x-auto">
                <table class="w-full table-auto border-collapse shadow-md rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-gray-800 text-white text-sm">
                            <th class="p-4 text-left">No</th>
                            <th class="p-4 text-left">Nomor Pelanggan</th>
                            <th class="p-4 text-left">Nama</th>
                            <th class="p-4 text-left">Alamat</th>
                            <th class="p-4 text-left">Nomor Telepon</th>
                            <th class="p-4 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100 divide-y divide-gray-300">
                        @foreach ($data as $index => $item)
                            <tr class="hover:bg-gray-200 transition-all cursor-pointer" onclick="toggleDetails({{ $index }})">
                                <td class="p-4 text-gray-800 font-medium">{{ $index + 1 }}</td>
                                <td class="p-4 text-gray-600">{{ $item['nomor_pelanggan'] }}</td>
                                <td class="p-4 text-gray-600">{{ $item['nama'] }}</td>
                                <td class="p-4 text-gray-600">{{ Str::limit($item['alamat'], 30) }}</td>
                                <td class="p-4 text-gray-600">{{ $item['nomor_telp'] }}</td>
                                <td class="p-4 text-center">
                                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-sm transition-all" onclick="openModal('view', {{ $index }})">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg text-sm transition-all" onclick="openModal('edit', {{ $index }})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-sm transition-all" onclick="openModal('delete', {{ $index }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div>
        <!-- Modal Full-Screen -->
        <div id="modal" class="fixed inset-0 bg-black bg-opacity-30 hidden z-50">
            <div class="w-full h-full flex items-center justify-center p-6">
                <div class="bg-white rounded-lg shadow-2xl w-full h-full max-h-screen overflow-y-auto p-8">
                    <!-- Header Modal -->
                    <div class="flex justify-between items-center mb-6">
                        <h3 id="modalTitle" class="text-2xl font-semibold text-gray-800">Detail Pelanggan</h3>
                        <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times text-2xl"></i>
                        </button>
                    </div>
    
                    <!-- Form -->
                    <form id="modalForm" class="space-y-6">
                        <!-- Grid untuk Inputan -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Kolom 1 -->
                            <div class="space-y-4">
                                <!-- Nomor Pelanggan -->
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1"><i class="fas fa-id-card mr-2"></i>Nomor Pelanggan</label>
                                    <input type="text" id="modalNomorPelanggan" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                                </div>
    
                                <!-- Nama -->
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1"><i class="fas fa-user mr-2"></i>Nama</label>
                                    <input type="text" id="modalNama" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                                </div>
    
                                <!-- NIK -->
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1"><i class="fas fa-id-badge mr-2"></i>NIK</label>
                                    <input type="text" id="modalNik" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                                </div>
    
                                <!-- Alamat -->
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1"><i class="fas fa-map-marker-alt mr-2"></i>Alamat</label>
                                    <textarea id="modalAlamat" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" rows="3"></textarea>
                                </div>
                            </div>
    
                            <!-- Kolom 2 -->
                            <div class="space-y-4">
                                <!-- Nomor Telepon -->
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1"><i class="fas fa-phone mr-2"></i>Nomor Telepon</label>
                                    <input type="text" id="modalNomorTelp" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                                </div>
    
                                <!-- Nomor Meteran -->
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1"><i class="fas fa-tachometer-alt mr-2"></i>Nomor Meteran</label>
                                    <input type="text" id="modalNomorMeteran" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                                </div>
    
                                <!-- Latitude dan Longitude -->
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-gray-700 font-medium mb-1"><i class="fas fa-map-pin mr-2"></i>Latitude</label>
                                        <input type="text" id="modalLatitude" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 font-medium mb-1"><i class="fas fa-map-pin mr-2"></i>Longitude</label>
                                        <input type="text" id="modalLongitude" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                                    </div>
                                </div>
    
                                <!-- Data GeoJSON -->
                                <div>
                                    <label class="block text-gray-700 font-medium mb-1"><i class="fas fa-map mr-2"></i>Data GeoJSON</label>
                                    <textarea id="modalDataGeojson" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
    
                        <!-- Grid untuk Inputan Lanjutan -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- User -->
                            <div>
                                <label class="block text-gray-700 font-medium mb-1"><i class="fas fa-user-tie mr-2"></i>User</label>
                                <input type="text" id="modalUser" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            </div>
    
                            <!-- Kecamatan -->
                            <div>
                                <label class="block text-gray-700 font-medium mb-1"><i class="fas fa-building mr-2"></i>Kecamatan</label>
                                <input type="text" id="modalKecamatan" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            </div>
    
                            <!-- Desa -->
                            <div>
                                <label class="block text-gray-700 font-medium mb-1"><i class="fas fa-home mr-2"></i>Desa</label>
                                <input type="text" id="modalDesa" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            </div>
    
                            <!-- Kategori -->
                            <div>
                                <label class="block text-gray-700 font-medium mb-1"><i class="fas fa-tags mr-2"></i>Kategori</label>
                                <input type="text" id="modalKategori" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            </div>
    
                            <!-- Area -->
                            <div>
                                <label class="block text-gray-700 font-medium mb-1"><i class="fas fa-globe mr-2"></i>Area</label>
                                <input type="text" id="modalArea" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
                            </div>
                        </div>
    
                        <!-- Tombol Aksi -->
                        <div class="flex justify-end space-x-4 mt-8">
                            <button type="button" onclick="closeModal()" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg transition-all">
                                <i class="fas fa-times mr-2"></i>Batal
                            </button>
                            <button type="submit" id="modalSubmit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition-all">
                                <i class="fas fa-save mr-2"></i>Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function openModal(type, index) {
            const modal = document.getElementById('modal');
            modal.classList.remove('hidden');
            document.getElementById('modalTitle').innerText = type.charAt(0).toUpperCase() + type.slice(1);
            document.getElementById('modalSubmit').innerText = type === 'delete' ? 'Delete' : 'Save';
        }
        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }
    </script>
    
</div>