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
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <form wire:submit.prevent="save">
          <!-- Form Sections Grid -->
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
              <!-- Left Column (2/3 width on large screens) -->
              <div class="lg:col-span-2 space-y-8">
                  <!-- Personal Information Card -->
                  <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm">
                      <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                          <div class="flex items-center">
                              <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 mr-4">
                                  <i class="fas fa-user-circle"></i>
                              </div>
                              <h2 class="text-lg font-medium text-gray-800">Informasi Pribadi test</h2>
                          </div>
                      </div>
                      
                      <div class="p-6">
                          <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-4">
                              <!-- Nama Lengkap -->
                              <div>
                                  <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">
                                      Nama Lengkap
                                  </label>
                                  <input type="text" 
                                      id="nama" 
                                      wire:model="nama" 
                                      class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" 
                                      required />
                                  @error('nama') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                              </div>
                              
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
                              
                              <!-- Nomor Telepon -->
                              <div>
                                  <label for="nomor_telp" class="block text-sm font-medium text-gray-700 mb-1">
                                      Nomor Telepon
                                  </label>
                                  <div class="flex">
                                      <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-50 border border-r-0 border-gray-300 rounded-l-md">
                                          +62
                                      </span>
                                      <input type="text" 
                                          id="nomor_telp" 
                                          wire:model="nomor_telp" 
                                          class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-r-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" />
                                  </div>
                                  @error('nomor_telp') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                              </div>
                              
                              <!-- Email -->
                              <div>
                                  <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                      Email
                                  </label>
                                  <input type="email" 
                                      id="email" 
                                      wire:model="email" 
                                      class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" />
                                  @error('email') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                              </div>
                              
                              <!-- Alamat -->
                              <div class="md:col-span-2">
                                  <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">
                                      Alamat
                                  </label>
                                  <textarea 
                                      id="alamat" 
                                      wire:model="alamat" 
                                      rows="3" 
                                      class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600"></textarea>
                                  @error('alamat') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                              </div>
                          </div>
                      </div>
                  </div>
                  
                  <!-- Customer Information Card -->
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
                              <!-- Nomor Pelanggan -->
                              <div>
                                  <label for="nomor_pelanggan" class="block text-sm font-medium text-gray-700 mb-1">
                                      Nomor Pelanggan
                                  </label>
                                  <input type="text" 
                                      id="nomor_pelanggan" 
                                      wire:model="nomor_pelanggan" 
                                      class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600 {{ isset($customer) ? 'bg-gray-50' : '' }}" 
                                      {{ isset($customer) ? 'readonly' : '' }} />
                                  @error('nomor_pelanggan') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                              </div>
                              
                              <!-- Nomor Meteran -->
                              <div>
                                  <label for="nomor_meteran" class="block text-sm font-medium text-gray-700 mb-1">
                                      Nomor Meteran
                                  </label>
                                  <input type="text" 
                                      id="nomor_meteran" 
                                      wire:model="nomor_meteran" 
                                      class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" />
                                  @error('nomor_meteran') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                              </div>
                              
                              <!-- Kategori -->
                              <div>
                                  <label for="kategori_id" class="block text-sm font-medium text-gray-700 mb-1">
                                      Kategori
                                  </label>
                                  <select id="kategori_id" 
                                      wire:model="kategori_id" 
                                      class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                                      <option value="">Pilih Kategori</option>
                                      @foreach($kategoris as $kategori)
                                          <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                      @endforeach
                                  </select>
                                  @error('kategori_id') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                              </div>
                              
                              <!-- Area -->
                              <div>
                                  <label for="area_id" class="block text-sm font-medium text-gray-700 mb-1">
                                      Area
                                  </label>
                                  <select id="area_id" 
                                      wire:model="area_id" 
                                      class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                                      <option value="">Pilih Area</option>
                                      @foreach($areas as $area)
                                          <option value="{{ $area->id }}">{{ $area->nama }}</option>
                                      @endforeach
                                  </select>
                                  @error('area_id') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                              </div>
                              
                              <!-- Kecamatan -->
                              <div>
                                  <label for="kecamatan_id" class="block text-sm font-medium text-gray-700 mb-1">
                                      Kecamatan
                                  </label>
                                  <select id="kecamatan_id" 
                                      wire:model="kecamatan_id" 
                                      class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                                      <option value="">Pilih Kecamatan</option>
                                      @foreach($kecamatans as $kecamatan)
                                          <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
                                      @endforeach
                                  </select>
                                  @error('kecamatan_id') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                              </div>
                              
                              <!-- Desa -->
                              <div>
                                  <label for="desa_id" class="block text-sm font-medium text-gray-700 mb-1">
                                      Desa
                                  </label>
                                  <select id="desa_id" 
                                      wire:model="desa_id" 
                                      class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                                      <option value="">Pilih Desa</option>
                                      @foreach($desas as $desa)
                                          <option value="{{ $desa->id }}">{{ $desa->nama_desa }}</option>
                                      @endforeach
                                  </select>
                                  @error('desa_id') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                              </div>
                          </div>
                      </div>
                  </div>
                  
                  <!-- Account Information Card (For new users only) -->
                  @if(!isset($customer))
                  <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm">
                      <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                          <div class="flex items-center">
                              <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 mr-4">
                                  <i class="fas fa-user-shield"></i>
                              </div>
                              <h2 class="text-lg font-medium text-gray-800">Informasi Akun</h2>
                          </div>
                      </div>
                      
                      <div class="p-6">
                          <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-4">
                              <!-- Username -->
                              <div>
                                  <label for="username" class="block text-sm font-medium text-gray-700 mb-1">
                                      Username
                                  </label>
                                  <input type="text" 
                                      id="username" 
                                      wire:model="username" 
                                      class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" />
                                  @error('username') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                              </div>
                              
                              <!-- Password -->
                              <div>
                                  <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                                      Password
                                  </label>
                                  <input type="password" 
                                      id="password" 
                                      wire:model="password" 
                                      class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" />
                                  @error('password') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                              </div>
                              
                              <!-- Role -->
                              <div>
                                  <label for="role" class="block text-sm font-medium text-gray-700 mb-1">
                                      Role
                                  </label>
                                  <select id="role" 
                                      wire:model="role" 
                                      class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                                      <option value="">Pilih Role</option>
                                      <option value="customer">Customer</option>
                                      <option value="admin">Admin</option>
                                  </select>
                                  @error('role') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                              </div>
                              
                              <!-- Status -->
                              <div>
                                  <label for="status" class="block text-sm font-medium text-gray-700 mb-1">
                                      Status
                                  </label>
                                  <select id="status" 
                                      wire:model="status" 
                                      class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600">
                                      <option value="active">Aktif</option>
                                      <option value="inactive">Tidak Aktif</option>
                                  </select>
                                  @error('status') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
                              </div>
                          </div>
                      </div>
                  </div>
                  @endif
                  
              </div>
              
              <!-- Right Column (1/3 width on large screens) -->
              <div class="space-y-8">
                  <!-- Peta Lokasi Card -->
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
                          
                          <!-- Location Search -->
                          <div class="mt-6">
                              <label for="search_location" class="block text-sm font-medium text-gray-700 mb-1">
                                  Cari Lokasi
                              </label>
                              <div class="flex rounded-md">
                                  <input type="text" 
                                      id="search_location" 
                                      class="block w-full px-3 py-2 text-sm text-gray-900 bg-white border border-r-0 border-gray-300 rounded-l-md focus:outline-none focus:ring-1 focus:ring-blue-600 focus:border-blue-600" 
                                      placeholder="Masukkan alamat atau tempat" />
                                  <button type="button" 
                                      class="px-4 py-2 bg-gray-50 border border-l-0 border-gray-300 rounded-r-md hover:bg-gray-100">
                                      <i class="fas fa-search text-gray-500"></i>
                                  </button>
                              </div>
                          </div>
                      </div>
                  </div>
                  
                  <!-- Help Card -->
                  <div class="bg-blue-50 rounded-xl border border-blue-100 overflow-hidden">
                      <div class="p-5">
                          <div class="flex">
                              <div class="flex-shrink-0">
                                  <i class="fas fa-info-circle text-blue-500 text-lg"></i>
                              </div>
                              <div class="ml-3">
                                  <h3 class="text-sm font-medium text-blue-800">Informasi</h3>
                                  <div class="mt-2 text-sm text-blue-700">
                                      <ul class="list-disc pl-5 space-y-1">
                                          <li>Nomor pelanggan akan otomatis terisi jika tidak diisi</li>
                                          <li>Pastikan semua informasi sudah benar sebelum menyimpan</li>
                                          <li>Untuk menentukan lokasi, klik pada peta atau masukkan koordinat secara manual</li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </form>
  </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Initialize the map when available
  if (document.getElementById('map') && typeof google !== 'undefined' && google.maps) {
      const initialLat = {{ $latitude ?? -8.5 }}; // Default to Indonesia's approximate coordinates
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
      
      // Add marker for selected location
      let marker = new google.maps.Marker({
          position: { lat: initialLat, lng: initialLng },
          map: map,
          draggable: true,
          animation: google.maps.Animation.DROP,
      });
      
      // Update coordinates when marker is dragged
      google.maps.event.addListener(marker, 'dragend', function() {
          const position = marker.getPosition();
          @this.set('latitude', position.lat());
          @this.set('longitude', position.lng());
      });
      
      // Add marker when clicking on map
      google.maps.event.addListener(map, 'click', function(event) {
          marker.setPosition(event.latLng);
          @this.set('latitude', event.latLng.lat());
          @this.set('longitude', event.latLng.lng());
      });
      
      // Initialize location search
      const searchInput = document.getElementById('search_location');
      const searchBox = new google.maps.places.SearchBox(searchInput);
      
      // Bias SearchBox results towards current map's viewport
      map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
      });
      
      // Listen for the event fired when the user selects a prediction
      searchBox.addListener('places_changed', function() {
          const places = searchBox.getPlaces();
          
          if (places.length === 0) {
              return;
          }
          
          // For each place, get location
          const bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
              if (!place.geometry || !place.geometry.location) {
                  console.log("Returned place contains no geometry");
                  return;
              }
              
              // Update marker position and map view
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
      
      // Listen for Livewire updates to refresh the map
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
@endpush 