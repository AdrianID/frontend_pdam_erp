<div class="bg-white rounded-xl shadow-sm mx-6 my-3">
    <div class="p-6">
    <!-- Header Section -->
<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-semibold text-gray-800">Manajemen Status Pembayaran</h2>
    <div class="flex items-center space-x-2">
        <!-- Status Filter Dropdown -->
        <div class="relative" x-data="{ open: false }">
            <button 
                @click="open = !open"
                class="flex items-center justify-between px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-40"
            >
                <span>
                    @if($statusFilter === 'all')
                        Semua Status
                    @elseif($statusFilter === 'billing')
                        Billing
                    @else
                        Paid
                    @endif
                </span>
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            
            <div 
                x-show="open"
                @click.away="open = false"
                class="absolute right-0 z-10 w-full mt-1 bg-white border border-gray-200 rounded-md shadow-lg"
            >
                <div class="py-1">
                    <button 
                        wire:click="applyFilter('all')"
                        class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 {{ $statusFilter === 'all' ? 'bg-blue-50 text-blue-600' : '' }}"
                    >
                        Semua Status
                    </button>
                    <button 
                        wire:click="applyFilter('billing')"
                        class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 {{ $statusFilter === 'billing' ? 'bg-blue-50 text-blue-600' : '' }}"
                    >
                        Billing
                    </button>
                    <button 
                        wire:click="applyFilter('paid')"
                        class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100 {{ $statusFilter === 'paid' ? 'bg-blue-50 text-blue-600' : '' }}"
                    >
                        Paid
                    </button>
                </div>
            </div>
        </div>

        <!-- Search Input -->
        <input 
            type="text" 
            wire:model.live.debounce.300ms="search"
            placeholder="Cari pelanggan..."
            class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
        >
        <button 
            wire:click="resetFilters"
            class="px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50"
        >
            Reset
        </button>
    </div>
</div>

        <!-- Messages -->
        @if($successMessage)
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ $successMessage }}
            </div>
        @endif
        
        @if($errorMessage)
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                {{ $errorMessage }}
            </div>
        @endif

        <!-- Table Section -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Pelanggan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No Pelanggan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($pelanggan as $index => $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $index + $pelanggan->firstItem() }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $item->nama_pelanggan }}</div>
                            <div class="text-xs text-gray-500">{{ $item->nomor_telp }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $item->nomor_pelanggan }}
                        </td>
                        <!-- Status Display in Table -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($item->status === 'paid')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-green-400" fill="currentColor" viewBox="0 0 8 8">
                                        <circle cx="4" cy="4" r="3" />
                                    </svg>
                                    Paid
                                </span>
                                <div class="text-xs text-gray-500 mt-1">
                                    {{ $item->paid_at?->format('d/m/Y H:i') }}
                                </div>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-blue-400" fill="currentColor" viewBox="0 0 8 8">
                                        <circle cx="4" cy="4" r="3" />
                                    </svg>
                                    Billing
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                            @if($item->status === 'billing')
                                <button 
                                    wire:click="confirmPayment({{ $item->id }})"
                                    style="display: inline-flex; align-items: center; padding: 0.5rem 1rem; font-size: 0.875rem; font-weight: 500; border-radius: 0.375rem; background-color: #10B981; color: white; transition: all 0.2s; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);"
                                    onmouseover="this.style.backgroundColor='#059669'; this.style.transform='translateY(-1px)';" 
                                    onmouseout="this.style.backgroundColor='#10B981'; this.style.transform='translateY(0)';"
                                >
                                    <i class="fas fa-check mr-2" style="font-size: 0.75rem;"></i> Approve
                                </button>
                            @else
                                <button 
                                    wire:click="cancelApproval({{ $item->id }})"
                                    style="display: inline-flex; align-items: center; padding: 0.5rem 1rem; font-size: 0.875rem; font-weight: 500; border-radius: 0.375rem; background-color: #EF4444; color: white; transition: all 0.2s; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);"
                                    onmouseover="this.style.backgroundColor='#DC2626'; this.style.transform='translateY(-1px)';" 
                                    onmouseout="this.style.backgroundColor='#EF4444'; this.style.transform='translateY(0)';"
                                >
                                    <i class="fas fa-times mr-2" style="font-size: 0.75rem;"></i> Cancel
                                </button>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                            Tidak ada data pelanggan
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $pelanggan->links() }}
        </div>
    </div>

<!-- Confirmation Modal -->
@if($showConfirmationModal)
    <div class="fixed inset-0 flex items-center justify-center z-50 p-4" style="background-color: rgba(0, 0, 0, 0.25);">
        <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-2xl">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-medium text-gray-900">Detail Tagihan</h3>
                <button wire:click="closeModal" class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="mb-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <h4 class="font-medium text-gray-900">Informasi Pelanggan</h4>
                        <div class="mt-2 space-y-1 text-sm text-gray-500">
                            <p><strong>Nama:</strong> {{ $selectedPelangganName }}</p>
                            <p><strong>No. Pelanggan:</strong> {{ $selectedPelangganDetails->nomor_pelanggan ?? '-' }}</p>
                            <p><strong>No. Meteran:</strong> {{ $selectedPelangganDetails->nomor_meteran ?? '-' }}</p>
                            <p><strong>Alamat:</strong> {{ $selectedPelangganDetails->alamat ?? '-' }}</p>
                            <p><strong>Kategori:</strong> {{ $selectedPelangganDetails->kategori->nama_kategori ?? '-' }}</p>
                            <p><strong>Biaya Pasang:</strong> Rp {{ number_format($selectedPelangganDetails->kategori->biaya_pasang ?? 0, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="font-medium text-gray-900">Detail Tagihan</h4>
                        <div class="mt-2 space-y-2">
                            <div>
                                <label for="total_tagihan" class="block text-sm font-medium text-gray-700">Total Tagihan</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">Rp</span>
                                    </div>
                                    <input
                                        type="text"
                                        wire:model="total_tagihan"
                                        id="total_tagihan"
                                        x-data
                                        x-mask:dynamic="$money($input, '.', ',', 2)"
                                        class="block w-full pl-12 pr-12 sm:text-sm border-gray-300 rounded-md bg-gray-100 cursor-not-allowed"
                                        placeholder="0,00"
                                        readonly
                                    >
                                </div>
                                @error('total_tagihan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="tanggal_jatuh_tempo" class="block text-sm font-medium text-gray-700">Tanggal Jatuh Tempo</label>
                        <input wire:model="tanggal_jatuh_tempo" type="date" id="tanggal_jatuh_tempo" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('tanggal_jatuh_tempo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    
                    <div>
                        <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan</label>
                        <input wire:model="catatan" type="text" id="catatan" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('catatan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
            
            <div class="flex justify-end space-x-3">
                <button 
                    wire:click="closeModal"
                    style="display: inline-flex; align-items: center; padding: 0.5rem 1rem; font-size: 0.875rem; font-weight: 500; border-radius: 0.375rem; background-color: white; color: #374151; border: 1px solid #D1D5DB; transition: all 0.2s; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);"
                    onmouseover="this.style.backgroundColor='#F3F4F6';" 
                    onmouseout="this.style.backgroundColor='white';"
                >
                    Batal
                </button>
                <button 
                    wire:click="markAsPaid"
                    style="display: inline-flex; align-items: center; padding: 0.5rem 1rem; font-size: 0.875rem; font-weight: 500; border-radius: 0.375rem; background-color: #10B981; color: white; transition: all 0.2s; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);"
                    onmouseover="this.style.backgroundColor='#059669'; this.style.transform='translateY(-1px)';" 
                    onmouseout="this.style.backgroundColor='#10B981'; this.style.transform='translateY(0)';"
                >
                    <i class="fas fa-check mr-2" style="font-size: 0.75rem;"></i> Paid
                </button>
            </div>
        </div>
    </div>
@endif
</div>