<div class="bg-white rounded-xl shadow-sm mx-6 my-3">
    <div class="p-6">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-800">Manajemen Stok Barang</h2>
            <div class="flex space-x-2">
                <button 
                    wire:click="toggleSummary"
                    class="flex items-center px-4 py-2 bg-blue-100 border border-blue-200 rounded-lg text-sm font-medium text-blue-700 hover:bg-blue-200 transition-colors"
                >
                    <i class="fas fa-chart-pie mr-2"></i>
                    {{ $showSummary ? 'Sembunyikan' : 'Tampilkan' }} Summary
                </button>
                <button 
                    wire:click="resetFilters"
                    class="flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors"
                >
                    <i class="fas fa-sync-alt mr-2 text-gray-500"></i>
                    Reset
                </button>
            </div>
        </div>

        <!-- Summary Section -->
        @if($showSummary)
        <div class="mb-6 bg-blue-50 p-4 rounded-lg">
            <h3 class="text-lg font-medium text-gray-800 mb-3">Summary Stok per Kategori</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach($stokSummary as $summary)
                <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="font-medium text-gray-800">{{ ucfirst($summary->kategori) }}</h4>
                            <p class="text-sm text-gray-500">{{ $summary->jumlah_barang }} barang</p>
                        </div>
                        <span class="px-2 py-1 text-xs font-semibold rounded-full 
                            {{ $summary->total_stok <= $summary->total_stok_minimal ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                            {{ $summary->total_stok <= $summary->total_stok_minimal ? 'Stok Rendah' : 'Stok Aman' }}
                        </span>
                    </div>
                    <div class="mt-3">
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-gray-600">Total Stok:</span>
                            <span class="font-medium">{{ number_format($summary->total_stok) }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Stok Minimal:</span>
                            <span class="font-medium">{{ number_format($summary->total_stok_minimal) }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Filter Section -->
        <div class="mb-6 bg-gray-50 p-4 rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Search Input -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pencarian</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input 
                            type="text" 
                            wire:model.live.debounce.300ms="search"
                            placeholder="Cari berdasarkan nama/kode..."
                            class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition"
                        >
                    </div>
                </div>

                <!-- Kategori Select -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <div class="relative">
                        <select 
                            wire:model.live="kategori"
                            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 transition"
                        >
                            <option value="">Semua Kategori</option>
                            @foreach($kategoriList as $kategori)
                                <option value="{{ $kategori }}">{{ ucfirst($kategori) }}</option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <!-- Stok Rendah Toggle -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Filter</label>
                    <div class="relative flex items-start">
                        <div class="flex items-center h-5">
                            <input 
                                type="checkbox" 
                                id="stokRendah"
                                wire:model.live="stokRendah"
                                class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded"
                            >
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="stokRendah" class="font-medium text-gray-700">Stok Rendah</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="overflow-hidden rounded-lg border border-gray-200 shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Kode
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Nama Barang
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Kategori
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Stok
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($barangs as $index => $barang)
                        <tr class="hover:bg-gray-50 transition-colors {{ $barang->stok_tersedia <= $barang->stok_minimal ? 'bg-yellow-50' : '' }}">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $index + $barangs->firstItem() }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-blue-600">{{ $barang->kode_barang }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $barang->nama_barang }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    {{ ucfirst($barang->kategori) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-1">
                                        <div class="text-sm font-medium {{ $barang->stok_tersedia <= $barang->stok_minimal ? 'text-red-600' : 'text-gray-900' }}">
                                            {{ number_format($barang->stok_tersedia) }}
                                        </div>
                                        <div class="text-xs text-gray-500">Min: {{ number_format($barang->stok_minimal) }}</div>
                                    </div>
                                    @if($barang->stok_tersedia <= $barang->stok_minimal)
                                        <i class="fas fa-exclamation-circle text-red-500 ml-2"></i>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($barang->stok_tersedia <= $barang->stok_minimal)
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 animate-pulse">
                                        <i class="fas fa-exclamation-triangle mr-1"></i> Stok Rendah
                                    </span>
                                @else
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        <i class="fas fa-check-circle mr-1"></i> Aman
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-500">
                                    <i class="fas fa-box-open text-4xl mb-2"></i>
                                    <p class="text-lg font-medium">Tidak ada data barang</p>
                                    <p class="text-sm">Coba ubah filter pencarian Anda</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4 px-4 py-3 bg-white border-t border-gray-200 sm:px-6 rounded-b-lg">
            {{ $barangs->links() }}
        </div>
    </div>
</div>