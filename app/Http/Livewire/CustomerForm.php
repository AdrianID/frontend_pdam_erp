<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class CustomerForm extends Component
{
    // Form Fields
    public $customer_id;
    
    // Personal Information
    public $nama;
    public $nik;
    public $nomor_telp;
    public $email;
    public $alamat;
    
    // Customer Information
    public $nomor_pelanggan;
    public $nomor_meteran;
    public $kategori_id;
    public $area_id;
    public $kecamatan_id;
    public $desa_id;
    
    // Account Information
    public $username;
    public $password;
    public $role = 'pelanggan';
    public $status = 'active';
    
    // Location
    public $latitude = -8.5; // Default to Indonesia coordinates
    public $longitude = 115.2;
    
    // Related Data (initialize as empty collections to avoid foreach() errors)
    public $kategoris = [];
    public $areas = [];
    public $kecamatans = [];
    public $desas = [];
    
    // Listeners for events from other components
    protected $listeners = ['refreshDesas' => 'loadDesas'];

    public function mount($customer_id = null)
    {
        $this->customer_id = $customer_id;
        
        // Always load related data first to avoid null objects in dropdowns
        $this->loadRelatedData();
        
        if ($this->customer_id) {
            $this->loadCustomer();
        }
    }

    public function loadCustomer()
    {
        try {
            // Make API request to get customer data
            $response = Http::get("http://45.80.181.85:8001/pelanggan/{$this->customer_id}");
            
            // Check if request was successful
            if ($response->successful()) {
                $data = $response->json();
                
                if (isset($data['status']) && $data['status'] === true && isset($data['data'])) {
                    $customer = $data['data'];
                    
                    // Personal Information
                    $this->nama = $customer['nama'];
                    $this->nik = $customer['nik'];
                    $this->nomor_telp = $customer['nomor_telp'];
                    $this->email = $customer['user']['email'];
                    $this->alamat = $customer['alamat'];
                    
                    // Customer Information
                    $this->nomor_pelanggan = $customer['nomor_pelanggan'];
                    $this->nomor_meteran = $customer['nomor_meteran'];
                    $this->kategori_id = $customer['kategori']['id'];
                    $this->area_id = $customer['area']['id'];
                    $this->kecamatan_id = $customer['kecamatan']['id'];
                    $this->desa_id = $customer['desa']['id'];
                    
                    // Location
                    $this->latitude = $customer['latitude'];
                    $this->longitude = $customer['longitude'];
                    
                    // If we need to load the desas based on kecamatan
                    $this->loadDesas();
                    
                    // Emit event to update map
                    $this->dispatchBrowserEvent('refreshMap', [
                        'latitude' => $this->latitude,
                        'longitude' => $this->longitude
                    ]);
                } else {
                    session()->flash('error', 'Format respon API tidak sesuai.');
                    $this->redirect(route('customers'));
                }
            } else {
                session()->flash('error', 'Gagal mengambil data pelanggan dari API. Status: ' . $response->status());
                $this->redirect(route('customers'));
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat menghubungi API: ' . $e->getMessage());
            $this->redirect(route('customers'));
        }
    }

    public function save()
    {
        // Validate the form data
        $this->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'nomor_telp' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string',
            'nomor_meteran' => 'required|string|max:50',
            'kategori_id' => 'required',
            'area_id' => 'required',
            'kecamatan_id' => 'required',
            'desa_id' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);
        
        // Additional validation for new users
        if (!$this->customer_id) {
            $this->validate([
                'username' => 'required|string|max:255',
                'password' => 'required|string|min:8',
                'role' => 'required|in:pelanggan,admin',
                'status' => 'required|in:active,inactive',
            ]);
        }
        
        try {
            // Prepare data for API
            $customerData = [
                'nama' => $this->nama,
                'nik' => $this->nik,
                'alamat' => $this->alamat,
                'nomor_telp' => $this->nomor_telp,
                'nomor_meteran' => $this->nomor_meteran,
                'kategori_id' => $this->kategori_id,
                'area_id' => $this->area_id,
                'kecamatan_id' => $this->kecamatan_id,
                'desa_id' => $this->desa_id,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'email' => $this->email,
            ];
            
            // Add user-specific fields for new users
            if (!$this->customer_id) {
                $customerData['username'] = $this->username;
                $customerData['password'] = $this->password;
                $customerData['role'] = $this->role;
                $customerData['status'] = $this->status;
                
                if (empty($this->nomor_pelanggan)) {
                    $customerData['nomor_pelanggan'] = 'CUST' . date('Ymd') . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
                } else {
                    $customerData['nomor_pelanggan'] = $this->nomor_pelanggan;
                }
            }
            
            $response = null;
            
            if ($this->customer_id) {
                // Update existing customer via API
                $response = Http::put("http://45.80.181.85:8001/pelanggan/{$this->customer_id}", $customerData);
            } else {
                // Create new customer via API
                $response = Http::post("http://45.80.181.85:8001/pelanggan", $customerData);
            }
            
            // Check if request was successful
            if ($response->successful()) {
                $data = $response->json();
                
                if (isset($data['status']) && $data['status'] === true) {
                    // Show success message and redirect
                    session()->flash('message', $this->customer_id ? 'Pelanggan berhasil diperbarui.' : 'Pelanggan baru berhasil ditambahkan.');
                    return redirect()->route('customers');
                } else {
                    session()->flash('error', $data['message'] ?? 'Terjadi kesalahan pada API.');
                }
            } else {
                $errorData = $response->json();
                $errorMessage = isset($errorData['message']) ? $errorData['message'] : 'Terjadi kesalahan pada server.';
                session()->flash('error', 'Gagal menyimpan data. ' . $errorMessage . ' (Status: ' . $response->status() . ')');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Load all related data for dropdowns (dummy data)
    private function loadRelatedData()
    {
        // Dummy categories (Kategori)
        $this->kategoris = collect([
            (object)['id' => 1, 'nama_kategori' => 'Rumah Tangga A', 'tarif' => 2500, 'denda' => 1000],
            (object)['id' => 2, 'nama_kategori' => 'Rumah Tangga B', 'tarif' => 3000, 'denda' => 1500],
            (object)['id' => 3, 'nama_kategori' => 'Niaga Kecil', 'tarif' => 4500, 'denda' => 2000],
            (object)['id' => 4, 'nama_kategori' => 'Niaga Besar', 'tarif' => 6000, 'denda' => 2500],
            (object)['id' => 5, 'nama_kategori' => 'Sosial', 'tarif' => 2000, 'denda' => 1000],
            (object)['id' => 6, 'nama_kategori' => 'Instansi Pemerintah', 'tarif' => 5000, 'denda' => 2500],
        ]);
        
        // Dummy areas
        $this->areas = collect([
            (object)['id' => 1, 'nama' => 'Area Utara', 'klasifikasi_area' => 'Pemukiman'],
            (object)['id' => 2, 'nama' => 'Area Selatan', 'klasifikasi_area' => 'Pemukiman'],
            (object)['id' => 3, 'nama' => 'Area Timur', 'klasifikasi_area' => 'Komersial'],
            (object)['id' => 4, 'nama' => 'Area Barat', 'klasifikasi_area' => 'Komersial'],
            (object)['id' => 5, 'nama' => 'Area Tengah', 'klasifikasi_area' => 'Industri'],
        ]);
        
        // Dummy kecamatan
        $this->kecamatans = collect([
            (object)['id' => 1, 'nama_kecamatan' => 'Bogor Utara'],
            (object)['id' => 2, 'nama_kecamatan' => 'Bogor Selatan'],
            (object)['id' => 3, 'nama_kecamatan' => 'Bogor Barat'],
            (object)['id' => 4, 'nama_kecamatan' => 'Bogor Timur'],
            (object)['id' => 5, 'nama_kecamatan' => 'Bogor Tengah'],
            (object)['id' => 6, 'nama_kecamatan' => 'Tanah Sareal'],
        ]);
        
        if ($this->kecamatan_id) {
            $this->loadDesas();
        } else {
            // Initialize empty desas collection to avoid null error
            $this->desas = collect([]);
        }
    }

    // Load desas based on selected kecamatan (dummy data)
    public function loadDesas()
    {
        // Default to empty collection
        $this->desas = collect([]);
        
        if ($this->kecamatan_id) {
            // Generate dummy desas based on the selected kecamatan
            switch ($this->kecamatan_id) {
                case 1: // Bogor Utara
                    $this->desas = collect([
                        (object)['id' => 1, 'nama_desa' => 'Bantarjati', 'kecamatan_id' => 1],
                        (object)['id' => 2, 'nama_desa' => 'Cibuluh', 'kecamatan_id' => 1],
                        (object)['id' => 3, 'nama_desa' => 'Ciluar', 'kecamatan_id' => 1],
                        (object)['id' => 4, 'nama_desa' => 'Tanah Baru', 'kecamatan_id' => 1],
                    ]);
                    break;
                    
                case 2: // Bogor Selatan
                    $this->desas = collect([
                        (object)['id' => 5, 'nama_desa' => 'Batutulis', 'kecamatan_id' => 2],
                        (object)['id' => 6, 'nama_desa' => 'Bondongan', 'kecamatan_id' => 2],
                        (object)['id' => 7, 'nama_desa' => 'Empang', 'kecamatan_id' => 2],
                        (object)['id' => 8, 'nama_desa' => 'Lawanggintung', 'kecamatan_id' => 2],
                    ]);
                    break;
                    
                case 3: // Bogor Barat
                    $this->desas = collect([
                        (object)['id' => 9, 'nama_desa' => 'Bubulak', 'kecamatan_id' => 3],
                        (object)['id' => 10, 'nama_desa' => 'Margajaya', 'kecamatan_id' => 3],
                        (object)['id' => 11, 'nama_desa' => 'Menteng', 'kecamatan_id' => 3],
                        (object)['id' => 12, 'nama_desa' => 'Situ Gede', 'kecamatan_id' => 3],
                    ]);
                    break;
                    
                case 4: // Bogor Timur
                    $this->desas = collect([
                        (object)['id' => 13, 'nama_desa' => 'Baranangsiang', 'kecamatan_id' => 4],
                        (object)['id' => 14, 'nama_desa' => 'Katulampa', 'kecamatan_id' => 4],
                        (object)['id' => 15, 'nama_desa' => 'Sukasari', 'kecamatan_id' => 4],
                        (object)['id' => 16, 'nama_desa' => 'Tajur', 'kecamatan_id' => 4],
                    ]);
                    break;
                    
                case 5: // Bogor Tengah
                    $this->desas = collect([
                        (object)['id' => 17, 'nama_desa' => 'Babakan', 'kecamatan_id' => 5],
                        (object)['id' => 18, 'nama_desa' => 'Gudang', 'kecamatan_id' => 5],
                        (object)['id' => 19, 'nama_desa' => 'Kebon Kelapa', 'kecamatan_id' => 5],
                        (object)['id' => 20, 'nama_desa' => 'Pabaton', 'kecamatan_id' => 5],
                    ]);
                    break;
                    
                case 6: // Tanah Sareal
                    $this->desas = collect([
                        (object)['id' => 21, 'nama_desa' => 'Kedung Badak', 'kecamatan_id' => 6],
                        (object)['id' => 22, 'nama_desa' => 'Kedung Jaya', 'kecamatan_id' => 6],
                        (object)['id' => 23, 'nama_desa' => 'Kebon Pedes', 'kecamatan_id' => 6],
                        (object)['id' => 24, 'nama_desa' => 'Tanah Sareal', 'kecamatan_id' => 6],
                    ]);
                    break;
                    
                default:
                    $this->desas = collect([]);
                    break;
            }
        }
    }

    public function render()
    {
        return view('livewire.customer-form');
    }
} 