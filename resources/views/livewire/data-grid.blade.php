<div class="p-6 rounded-xl">
    <div class="relative bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>
        
        <div class="p-6">
            <!-- Header/Title Section -->
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-1">Data Pelanggan</h2>
                    <p class="text-sm text-gray-500">Mengelola dan melihat data pelanggan Anda</p>
                </div>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Pelanggan
                </button>
            </div>
            
            <!-- Table Section -->
            <div class="bg-white rounded-xl overflow-hidden">
                <div class="flex items-center justify-between px-6 pt-4 pb-2">
                    <p></p>
                    <button class="text-sm bg-blue-500 text-white hover:bg-blue-700 transition-colors flex items-center px-4 py-2 rounded-lg">
                        <i class="fas fa-user-plus mr-1"></i>
                        Tambah Pelanggan
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full whitespace-nowrap">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 text-left border-b border-gray-100 min-w-[150px]">No. Pelanggan</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 text-left border-b border-gray-100 min-w-[200px]">Nama</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 text-left border-b border-gray-100 min-w-[250px]">Alamat</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 text-left border-b border-gray-100 min-w-[150px]">No. Meteran</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 text-left border-b border-gray-100 min-w-[150px]">Kategori</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 text-left border-b border-gray-100 min-w-[150px]">Area</th>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 text-left border-b border-gray-100 min-w-[120px]">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($customers as $customer)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $customer['nomor_pelanggan'] }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $customer['nama'] }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $customer['alamat'] }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $customer['nomor_meteran'] }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-medium bg-blue-50 text-blue-700 rounded-full">
                                        {{ $customer['kategori']['nama_kategori'] }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $customer['area']['nama'] }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-3">
                                        <a href="{{ route('customer.detail', ['id' => $customer['id']]) }}" class="p-2.5 text-blue-600 hover:text-white bg-blue-50 hover:bg-blue-600 rounded-lg transition-all flex items-center justify-center w-10 h-10 shadow-sm hover:shadow-md" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <button class="p-2.5 text-amber-600 hover:text-white bg-amber-50 hover:bg-amber-600 rounded-lg transition-all flex items-center justify-center w-10 h-10 shadow-sm hover:shadow-md" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="p-2.5 text-red-600 hover:text-white bg-red-50 hover:bg-red-600 rounded-lg transition-all flex items-center justify-center w-10 h-10 shadow-sm hover:shadow-md" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                    Tidak ada data pelanggan
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>