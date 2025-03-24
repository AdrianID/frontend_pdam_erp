<div class="rounded-xl bg-white px-3 py-5 my-3 mx-6 shadow-sm">
    <!-- Top App Bar dengan elevation -->
    <div class="text-gray z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center h-16">
                <button onclick="history.back()" class="mr-4 w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-100 transition-colors">
                    <i class="fas fa-arrow-left text-gray-700"></i>
                </button>
                <div>
                    <h1 class="text-lg font-medium text-gray-800">Detail Pelanggan</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero Section dengan Material Design -->
    @if ($customer)
    <div class="text-white relative overflow-hidden rounded-xl mb-8">
        <div class="absolute inset-0 text-blue-400 opacity-10"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">
            <div class="flex flex-col gap-6">
                <!-- Customer Information - Now all left-aligned -->
                <div class="space-y-3">
                    <div class="inline-flex items-center px-3 py-1.5 bg-blue-500 backdrop-blur-sm rounded-full text-sm font-medium">
                        <i class="fas fa-id-card mr-2"></i>
                        <span>{{ $customer['nomor_pelanggan'] }}</span>
                    </div>
                    <h1 class="text-4xl font-bold text-blue-50 drop-shadow-sm">{{ $customer['nama'] }}</h1>
                    <div class="flex items-center">
                        <i class="fas fa-map-marker-alt mr-2 text-blue-500"></i>
                        <span class="text-blue-500 font-medium">{{ $customer['kecamatan']['nama_kecamatan'] }}, {{ $customer['desa']['nama_desa'] }}</span>
                    </div>
                </div>
                
            </div>
        </div>
        
        <!-- Status Cards Overlap -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-20 mb-11">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 -mb-12">
                <div class="bg-white rounded-xl shadow-lg p-5 transform transition-transform hover:scale-105 hover:shadow-xl">
                    <div class="flex items-center mb-2">
                        <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 mr-3">
                            <i class="fas fa-water text-xl"></i>
                        </div>
                        <h3 class="text-gray-500 text-sm font-medium">Kategori</h3>
                    </div>
                    <p class="text-xl font-semibold text-gray-800">{{ $customer['kategori']['nama_kategori'] }}</p>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg p-5 transform transition-transform hover:scale-105 hover:shadow-xl">
                    <div class="flex items-center mb-2">
                        <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center text-green-600 mr-3">
                            <i class="fas fa-tachometer-alt text-xl"></i>
                        </div>
                        <h3 class="text-gray-500 text-sm font-medium">Meteran</h3>
                    </div>
                    <p class="text-xl font-semibold text-gray-800">{{ $customer['nomor_meteran'] }}</p>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg p-5 transform transition-transform hover:scale-105 hover:shadow-xl">
                    <div class="flex items-center mb-2">
                        <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 mr-3">
                            <i class="fas fa-hand-holding-usd text-xl"></i>
                        </div>
                        <h3 class="text-gray-500 text-sm font-medium">Tarif per m³</h3>
                    </div>
                    <p class="text-xl font-semibold text-gray-800">Rp {{ number_format($customer['kategori']['tarif'], 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        <!-- Tabs Navigation with Material Design -->
        <div class="mb-8 border-b border-gray-200 overflow-x-auto no-scrollbar">
            <nav class="-mb-px flex space-x-8">
                <button wire:click="setActiveTab('info')" class="{{ $activeTab == 'info' ? 'border-blue-500 text-blue-600' : 'text-gray-500 hover:text-gray-700 hover:border-gray-300 border-transparent' }} border-b-2 font-medium pb-3 px-1 focus:outline-none transition-colors">
                    Informasi Pelanggan
                </button>
                <button wire:click="setActiveTab('tagihan')" class="{{ $activeTab == 'tagihan' ? 'border-blue-500 text-blue-600' : 'text-gray-500 hover:text-gray-700 hover:border-gray-300 border-transparent' }} border-b-2 font-medium pb-3 px-1 focus:outline-none transition-colors">
                    Riwayat Tagihan
                </button>
                <button wire:click="setActiveTab('penggunaan')" class="{{ $activeTab == 'penggunaan' ? 'border-blue-500 text-blue-600' : 'text-gray-500 hover:text-gray-700 hover:border-gray-300 border-transparent' }} border-b-2 font-medium pb-3 px-1 focus:outline-none transition-colors">
                    Penggunaan Air
                </button>
            </nav>
        </div>

        <!-- Information Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left column (2/3 width) -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Personal Information Card -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center">
                                <i class="fas fa-user-circle text-blue-600 text-xl mr-3"></i>
                                <h2 class="text-lg font-semibold text-gray-800">Informasi Pribadi</h2>
                            </div>
                            <button class="text-blue-600 hover:text-blue-800 p-2 rounded-full hover:bg-blue-50 transition-colors">
                                <i class="fas fa-pen"></i>
                            </button>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-8">
                            <div>
                                <label class="text-xs font-medium text-gray-500 mb-1 block">Nama Lengkap</label>
                                <p class="text-gray-800 font-medium">{{ $customer['nama'] }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-medium text-gray-500 mb-1 block">NIK</label>
                                <p class="text-gray-800 font-medium">{{ $customer['nik'] }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-medium text-gray-500 mb-1 block">Nomor Telepon</label>
                                <p class="text-gray-800">{{ $customer['nomor_telp'] }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-medium text-gray-500 mb-1 block">Email</label>
                                <p class="text-gray-800">{{ $customer['user']['email'] }}</p>
                            </div>
                            <div class="md:col-span-2">
                                <label class="text-xs font-medium text-gray-500 mb-1 block">Alamat</label>
                                <p class="text-gray-800">{{ $customer['alamat'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Technical Information Card -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex items-center mb-6">
                            <i class="fas fa-cogs text-blue-600 text-xl mr-3"></i>
                            <h2 class="text-lg font-semibold text-gray-800">Informasi Teknis</h2>
                        </div>
                        
                        <div class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-100">
                                    <div class="text-xs font-medium text-gray-500 mb-1">Area</div>
                                    <div class="text-gray-800 font-medium">{{ $customer['area']['nama'] }}</div>
                                    <div class="mt-1 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $customer['area']['klasifikasi_area'] }}
                                    </div>
                                </div>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-100">
                                    <div class="text-xs font-medium text-gray-500 mb-1">Kecamatan</div>
                                    <div class="text-gray-800 font-medium">{{ $customer['kecamatan']['nama_kecamatan'] }}</div>
                                </div>
                                <div class="p-4 bg-gray-50 rounded-lg border border-gray-100">
                                    <div class="text-xs font-medium text-gray-500 mb-1">Desa</div>
                                    <div class="text-gray-800 font-medium">{{ $customer['desa']['nama_desa'] }}</div>
                                </div>
                            </div>
                            
                            <!-- Tarif Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="bg-blue-50 rounded-lg p-4 border border-blue-100">
                                    <div class="flex items-center mb-3">
                                        <i class="fas fa-money-bill-wave text-blue-600 mr-2"></i>
                                        <span class="text-sm font-medium text-blue-800">Tarif per m³</span>
                                    </div>
                                    <p class="text-2xl font-bold text-blue-800">Rp {{ number_format($customer['kategori']['tarif'], 0, ',', '.') }}</p>
                                </div>
                                <div class="bg-red-50 rounded-lg p-4 border border-red-100">
                                    <div class="flex items-center mb-3">
                                        <i class="fas fa-exclamation-circle text-red-600 mr-2"></i>
                                        <span class="text-sm font-medium text-red-800">Denda</span>
                                    </div>
                                    <p class="text-2xl font-bold text-red-800">Rp {{ number_format($customer['kategori']['denda'], 0, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Account Information Card -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center">
                                <i class="fas fa-user-shield text-blue-600 text-xl mr-3"></i>
                                <h2 class="text-lg font-semibold text-gray-800">Informasi Akun</h2>
                            </div>
                            <button class="text-blue-600 hover:text-blue-800 p-2 rounded-full hover:bg-blue-50 transition-colors">
                                <i class="fas fa-key"></i>
                            </button>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-8">
                            <div>
                                <label class="text-xs font-medium text-gray-500 mb-1 block">Email</label>
                                <p class="text-gray-800">{{ $customer['user']['email'] }}</p>
                            </div>
                            <div>
                                <label class="text-xs font-medium text-gray-500 mb-1 block">Role</label>
                                <div class="inline-flex items-center px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-sm font-medium">
                                    <i class="fas fa-user-tag mr-2"></i>
                                    {{ ucfirst($customer['user']['role']) }}
                                </div>
                            </div>
                            <div>
                                <label class="text-xs font-medium text-gray-500 mb-1 block">Status</label>
                                <div class="inline-flex items-center px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                                    <i class="fas fa-check-circle mr-2"></i>
                                    Aktif
                                </div>
                            </div>
                            <div>
                                <label class="text-xs font-medium text-gray-500 mb-1 block">Tanggal Bergabung</label>
                                <p class="text-gray-800">{{ date('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Column (1/3 width) -->
            <div class="space-y-8">
                <!-- Map Card -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="p-6 pb-3">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-map-marked-alt text-blue-600 text-xl mr-3"></i>
                                <h2 class="text-lg font-semibold text-gray-800">Lokasi</h2>
                            </div>
                            <a href="https://maps.google.com/?q={{ $customer['latitude'] }},{{ $customer['longitude'] }}" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center">
                                <span>Lihat di Google Maps</span>
                                <i class="fas fa-external-link-alt ml-1 text-xs"></i>
                            </a>
                        </div>
                    </div>
                    <div class="h-[300px] relative" id="map">
                        <div class="absolute inset-0 flex items-center justify-center bg-gray-100">
                            <div class="custom-pulsing-marker">
                                <div class="marker-pin">
                                    <div class="pin bg-blue-600"></div>
                                    <div class="pulse"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 bg-gray-50 border-t border-gray-100">
                        <div class="flex items-start">
                            <i class="fas fa-info-circle text-gray-400 mr-2 mt-1"></i>
                            <p class="text-sm text-gray-500">Koordinat: {{ $customer['latitude'] }}, {{ $customer['longitude'] }}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Actions Card -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                    <div class="p-6">
                        <div class="flex items-center mb-6">
                            <i class="fas fa-bolt text-blue-600 text-xl mr-3"></i>
                            <h2 class="text-lg font-semibold text-gray-800">Tindakan Cepat</h2>
                        </div>
                        
                        <div class="space-y-3">
                            <button class="w-full bg-blue-50 hover:bg-blue-100 text-blue-700 px-4 py-3 rounded-lg transition-colors flex items-center justify-between group border border-blue-100">
                                <div class="flex items-center">
                                    <i class="fas fa-file-invoice mr-3"></i>
                                    <span>Buat Tagihan Baru</span>
                                </div>
                                <i class="fas fa-chevron-right transition-transform group-hover:translate-x-1"></i>
                            </button>
                            
                            <button class="w-full bg-green-50 hover:bg-green-100 text-green-700 px-4 py-3 rounded-lg transition-colors flex items-center justify-between group border border-green-100">
                                <div class="flex items-center">
                                    <i class="fas fa-chart-line mr-3"></i>
                                    <span>Input Penggunaan Air</span>
                                </div>
                                <i class="fas fa-chevron-right transition-transform group-hover:translate-x-1"></i>
                            </button>
                            
                            <button class="w-full bg-purple-50 hover:bg-purple-100 text-purple-700 px-4 py-3 rounded-lg transition-colors flex items-center justify-between group border border-purple-100">
                                <div class="flex items-center">
                                    <i class="fas fa-message mr-3"></i>
                                    <span>Kirim Notifikasi</span>
                                </div>
                                <i class="fas fa-chevron-right transition-transform group-hover:translate-x-1"></i>
                            </button>
                            
                            <button class="w-full bg-amber-50 hover:bg-amber-100 text-amber-700 px-4 py-3 rounded-lg transition-colors flex items-center justify-between group border border-amber-100">
                                <div class="flex items-center">
                                    <i class="fas fa-history mr-3"></i>
                                    <span>Lihat Riwayat Pembayaran</span>
                                </div>
                                <i class="fas fa-chevron-right transition-transform group-hover:translate-x-1"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @else
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="bg-white rounded-xl shadow-md p-8 text-center">
                <div class="w-20 h-20 mx-auto bg-red-100 rounded-full flex items-center justify-center text-red-500 mb-6">
                    <i class="fas fa-exclamation-triangle text-3xl"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Data Tidak Ditemukan</h2>
                <p class="text-gray-600 mb-6">{{ $error ?? 'Terjadi kesalahan saat memuat data pelanggan' }}</p>
                <button onclick="history.back()" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>
                    <span>Kembali</span>
                </button>
            </div>
        </div>
    @endif
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize the map when available
    if (document.getElementById('map') && typeof google !== 'undefined' && google.maps) {
        const lat = {{ $customer['latitude'] ?? 0 }};
        const lng = {{ $customer['longitude'] ?? 0 }};
        
        const mapOptions = {
            center: { lat, lng },
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{"color": "#e9e9e9"},{"lightness": 17}]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [{"color": "#f5f5f5"},{"lightness": 20}]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#ffffff"},{"lightness": 17}]
                }
                // Additional styling can be added here
            ]
        };
        
        const map = new google.maps.Map(document.getElementById('map'), mapOptions);
        
        // Custom marker
        const marker = new google.maps.Marker({
            position: { lat, lng },
            map: map,
            title: "{{ $customer['nama'] }}",
            animation: google.maps.Animation.DROP,
            icon: {
                path: google.maps.SymbolPath.CIRCLE,
                scale: 10,
                fillColor: "#2563eb",
                fillOpacity: 1,
                strokeColor: "#ffffff",
                strokeWeight: 2
            }
        });
    }
});
</script>

<style>
/* Custom styles for map marker */
.custom-pulsing-marker {
    position: relative;
}
.marker-pin {
    position: relative;
}
.pin {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background-color: #2563eb;
    position: relative;
    z-index: 2;
}
.pulse {
    position: absolute;
    width: 40px;
    height: 40px;
    background: rgba(37, 99, 235, 0.3);
    border-radius: 50%;
    top: -12px;
    left: -12px;
    z-index: 1;
    animation: pulse 2s infinite;
}
@keyframes pulse {
    0% {
        transform: scale(0.5);
        opacity: 1;
    }
    100% {
        transform: scale(1.2);
        opacity: 0;
    }
}
/* Pattern background */
.pattern-dots-md {
    background-image: radial-gradient(currentColor 1px, transparent 1px);
    background-size: 5px 5px;
}
/* Hide scrollbar but allow scrolling */
.no-scrollbar {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
}
.no-scrollbar::-webkit-scrollbar {
    display: none;  /* Chrome, Safari, Opera */
}
</style> 
@endpush