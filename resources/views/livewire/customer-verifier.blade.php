<div class="p-6 rounded-xl">
    <div class="relative bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>
        
        <div class="p-6">
            <!-- Header/Title Section -->
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-1">Verifikasi Pelanggan</h2>
                    <p class="text-sm text-gray-500">Mengelola dan melihat data pelanggan Anda</p>
                </div>
            </div>
            
            <!-- Table Section -->
            <div class="bg-white rounded-xl overflow-hidden">
                <div class="flex items-center justify-between px-6 pt-4 pb-2">
                    <!-- Search Input -->
                    <div class="relative flex-1 max-w-md">
                        <div class="absolute inset-y-0 left-0 pl-4 pe-4 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400/75"></i>
                        </div>
                        <input 
                            wire:model.live.debounce.300ms="search" 
                            type="search" 
                            class="block w-full px-8 py-3 bg-gray-50 border-0 text-gray-900 text-sm placeholder:text-gray-400/75 rounded-xl focus:ring-2 focus:ring-inset focus:ring-blue-500 focus:bg-white transition-all duration-200"
                            placeholder="Cari pelanggan..."
                        >
                        @if($isLoading)
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                                <div class="animate-spin rounded-full h-5 w-5 border-[2.5px] border-gray-200 border-t-blue-600"></div>
                            </div>
                        @else
                            <!-- <button 
                                wire:click="$set('search', '')" 
                                class="{{ empty($search) ? 'hidden' : 'absolute inset-y-0 right-0 pr-4 flex items-center' }}"
                            >
                                <i class="fas fa-times text-gray-400 hover:text-gray-600 cursor-pointer"></i>
                            </button> -->
                        @endif
                    </div>
                    
                    {{-- <button class="text-sm bg-blue-500 text-white hover:bg-blue-700 transition-colors flex items-center px-4 py-2 rounded-lg ml-4">
                        <i class="fas fa-user-plus mr-1"></i>
                        Tambah Pelanggan
                    </button> --}}
                </div>

                <div class="overflow-x-auto relative">
                    <!-- Loading Overlay -->
                    <div wire:loading.delay.longer wire:target="search" class="absolute inset-0 bg-white/50 z-10 flex items-center justify-center">
                        <div class="flex items-center gap-2">
                            <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-blue-500"></div>
                            <span class="text-sm text-gray-500">Mencari data...</span>
                        </div>
                    </div>

                    <table class="w-full whitespace-nowrap">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-xs font-medium text-gray-500 text-left border-b border-gray-100 w-16">No</th>
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
                            @forelse($customers as $index => $customer)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $index + 1 }}</td>
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
                                        <a href="{{ route('pelanggan.detail', ['id' => $customer['id']]) }}" 
                                            class="p-2.5 bg-blue-500 hover:bg-blue-600 rounded-lg transition-all flex items-center justify-center w-10 h-10 shadow-sm hover:shadow-md"
                                            title="Lihat Detail">
                                            <i class="text-white fas fa-eye"></i>
                                        </a>
                                        <a href="#" 
                                            class="p-2.5 bg-green-500 hover:bg-green-600 rounded-lg transition-all flex items-center justify-center w-10 h-10 shadow-sm hover:shadow-md"
                                            title="Approve">
                                            <i class="text-white fas fa-check"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                                    {{ empty($search) ? 'Tidak ada data pelanggan' : 'Tidak ada hasil pencarian untuk "' . $search . '"' }}
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if($total > 0)
                <div class="px-6 py-4 border-t border-gray-100">
                    <div class="flex items-center justify-between">
                        <!-- Pagination Info -->
                        <div class="text-sm text-gray-500">
                            Menampilkan {{ ($currentPage - 1) * $perPage + 1 }} sampai {{ min($currentPage * $perPage, $total) }} dari {{ $total }} data
                        </div>
                        
                        <!-- Pagination Controls -->
                        <div class="flex items-center space-x-2">
                            <!-- Previous Button -->
                            <button 
                                wire:click="previousPage" 
                                class="px-3 py-2 text-sm font-medium {{ $currentPage == 1 ? 'text-gray-300 cursor-not-allowed' : 'text-gray-500 hover:text-blue-600' }} transition-colors"
                                {{ $currentPage == 1 ? 'disabled' : '' }}
                            >
                                <i class="fas fa-chevron-left"></i>
                            </button>

                            <!-- Page Numbers -->
                            <div class="flex items-center space-x-1">
                                @php
                                    $startPage = max($currentPage - 2, 1);
                                    $endPage = min($startPage + 4, $lastPage);
                                    if ($endPage - $startPage < 4) {
                                        $startPage = max($endPage - 4, 1);
                                    }
                                @endphp

                                @if($startPage > 1)
                                    <button 
                                        wire:click="gotoPage(1)" 
                                        class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-blue-600 transition-colors"
                                    >
                                        1
                                    </button>
                                    @if($startPage > 2)
                                        <span class="px-2 py-2 text-gray-400">...</span>
                                    @endif
                                @endif

                                @for($i = $startPage; $i <= $endPage; $i++)
                                    <button 
                                        wire:click="gotoPage({{ $i }})" 
                                        class="px-3 py-2 text-sm font-medium {{ $i == $currentPage 
                                            ? 'bg-blue-50 text-blue-600 rounded-lg' 
                                            : 'text-gray-500 hover:text-blue-600' }} transition-colors"
                                    >
                                        {{ $i }}
                                    </button>
                                @endfor

                                @if($endPage < $lastPage)
                                    @if($endPage < $lastPage - 1)
                                        <span class="px-2 py-2 text-gray-400">...</span>
                                    @endif
                                    <button 
                                        wire:click="gotoPage({{ $lastPage }})" 
                                        class="px-3 py-2 text-sm font-medium text-gray-500 hover:text-blue-600 transition-colors"
                                    >
                                        {{ $lastPage }}
                                    </button>
                                @endif
                            </div>

                            <!-- Next Button -->
                            <button 
                                wire:click="nextPage" 
                                class="px-3 py-2 text-sm font-medium {{ $currentPage == $lastPage ? 'text-gray-300 cursor-not-allowed' : 'text-gray-500 hover:text-blue-600' }} transition-colors"
                                {{ $currentPage == $lastPage ? 'disabled' : '' }}
                            >
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>