<div class="bg-white rounded-xl shadow-sm mx-6 my-3">
    <div class="p-6">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-800">Manajemen Status Pembayaran</h2>
            <div class="flex items-center space-x-2">
                <input 
                    type="text" 
                    wire:model.live.debounce.300ms="search"
                    placeholder="Cari pelanggan..."
                    class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                >
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
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($item->status === 'paid')
                                <span style="display: inline-flex; align-items: center; padding: 0.25rem 0.75rem; font-size: 0.75rem; font-weight: 600; border-radius: 9999px; background-color: #D1FAE5; color: #065F46;">
                                    <span style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background-color: #10B981; margin-right: 6px;"></span>
                                    PAID
                                </span>
                                <div class="text-xs text-gray-500 mt-1">
                                    {{ $item->paid_at?->format('d/m/Y H:i') }}
                                </div>
                            @else
                                <span style="display: inline-flex; align-items: center; padding: 0.25rem 0.75rem; font-size: 0.75rem; font-weight: 600; border-radius: 9999px; background-color: #DBEAFE; color: #1E40AF;">
                                    <span style="display: inline-block; width: 8px; height: 8px; border-radius: 50%; background-color: #3B82F6; margin-right: 6px;"></span>
                                    BILLING
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
            <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Konfirmasi Approve</h3>
                    <button wire:click="closeModal" class="text-gray-400 hover:text-gray-500">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <div class="mb-6">
                    <p class="text-sm text-gray-500">Anda yakin ingin mengapprove:</p>
                    <p class="font-medium">{{ $selectedPelangganName }}</p>
                    <p class="text-sm text-gray-500 mt-2">Status akan berubah menjadi LUNAS</p>
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
                        <i class="fas fa-check mr-2" style="font-size: 0.75rem;"></i> Approve
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>