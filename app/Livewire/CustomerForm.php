<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use Livewire\Attributes\Layout;

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
    public $pekerjaan;
    public $rt;
    public $rw;
    public $no_rumah;
    public $gang;
    public $blok;
    public $luas_bangunan;
    public $jenis_hunian;
    public $status_kepemilikan;
    public $kebutuhan_air_sebelumnya;
    public $kran_diminta;
    public $kwh_pln;
    public $dokumen_ktp = false;
    public $dokumen_kk = false;
    public $dokumen_pbb = false;
    
    // Customer Information
    public $nomor_pelanggan;
    public $nomor_meteran;
    public $kategori_id;
    public $area_id;
    public $kecamatan_id;
    public $desa_id;
    public $jenis_pelanggan;
    public $kelompok;
    
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
    public $jenisPelangganOptions = [];
    public $kelompokOptions = [];
    public $luasBangunanOptions = [];
    public $jenisHunianOptions = [];
    public $statusKepemilikanOptions = [];
    public $kebutuhanAirOptions = [];
    public $kwhPlnOptions = [];
    
    // Listeners for events from other components
    protected $listeners = ['refreshDesas' => 'loadDesas'];

    public function mount($id = null)
    {
        $this->customer_id = $id;
        
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
                    $this->pekerjaan = $customer['pekerjaan'];
                    $this->rt = $customer['rt'];
                    $this->rw = $customer['rw'];
                    $this->no_rumah = $customer['no_rumah'];
                    $this->gang = $customer['gang'];
                    $this->blok = $customer['blok'];
                    $this->luas_bangunan = $customer['luas_bangunan'];
                    $this->jenis_hunian = $customer['jenis_hunian'];
                    $this->status_kepemilikan = $customer['status_kepemilikan'];
                    $this->kebutuhan_air_sebelumnya = $customer['kebutuhan_air_sebelumnya'];
                    $this->kran_diminta = $customer['kran_diminta'];
                    $this->kwh_pln = $customer['kwh_pln'];
                    $this->dokumen_ktp = $customer['dokumen_ktp'];
                    $this->dokumen_kk = $customer['dokumen_kk'];
                    $this->dokumen_pbb = $customer['dokumen_pbb'];
                    
                    // Customer Information
                    $this->nomor_pelanggan = $customer['nomor_pelanggan'];
                    $this->nomor_meteran = $customer['nomor_meteran'];
                    $this->kategori_id = $customer['kategori']['id'];
                    $this->area_id = $customer['area']['id'];
                    $this->kecamatan_id = $customer['kecamatan']['id'];
                    $this->desa_id = $customer['desa']['id'];
                    $this->jenis_pelanggan = $customer['jenis_pelanggan'];
                    $this->kelompok = $customer['kelompok'];
                    
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
                }
            } else {
                session()->flash('error', 'Gagal mengambil data pelanggan dari API. Status: ' . $response->status());
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat menghubungi API: ' . $e->getMessage());
        }
    }

    public function save()
    {
        // Validate the form data
        // $this->validate([
        //     'nama' => 'required|string|max:255',
        //     'nik' => 'required|string|max:20',
        //     'nomor_telp' => 'required|string|max:15',
        //     'email' => 'required|email|max:255',
        //     'alamat' => 'required|string',
        //     'nomor_meteran' => 'required|string|max:50',
        //     'kategori_id' => 'required',
        //     'area_id' => 'required',
        //     'kecamatan_id' => 'required',
        //     'desa_id' => 'required',
        //     'latitude' => 'required|numeric',
        //     'longitude' => 'required|numeric',
        //     'username' => 'required|string|max:255',
        //     'password' => 'required|string|min:8',
        // ]);

        // Prepare data for API with the new structure
        $customerData = [
            'user' => [
                'username' => $this->username,
                'email' => $this->email,
                'password' => $this->password,
                'role' => 'customer'
            ],
            'kecamatan_id' => $this->kecamatan_id,
            'desa_id' => $this->desa_id ?? 1,
            'kategori_id' => $this->kategori_id,
            'area_id' => $this->area_id,
            'nomor_pelanggan' => $this->nomor_pelanggan ?? 'PLG-' . date('Y') . '-' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT),
            'nama' => $this->nama,
            'nik' => $this->nik,
            'alamat' => $this->alamat,
            'nomor_telp' => $this->nomor_telp,
            'nomor_meteran' => $this->nomor_meteran,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'pekerjaan' => $this->pekerjaan,
            'rt' => $this->rt,
            'rw' => $this->rw,
            'no_rumah' => $this->no_rumah,
            'gang' => $this->gang,
            'blok' => $this->blok,
            'luas_bangunan' => $this->luas_bangunan,
            'jenis_hunian' => $this->jenis_hunian,
            'status_kepemilikan' => $this->status_kepemilikan,
            'kebutuhan_air_sebelumnya' => $this->kebutuhan_air_sebelumnya,
            'kran_diminta' => $this->kran_diminta,
            'kwh_pln' => $this->kwh_pln,
            'dokumen_ktp' => $this->dokumen_ktp,
            'dokumen_kk' => $this->dokumen_kk,
            'dokumen_pbb' => $this->dokumen_pbb,
            'jenis_pelanggan' => $this->jenis_pelanggan,
            'kelompok' => $this->kelompok,
            'data_geojson' => [
                'type' => 'Feature',
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [$this->longitude, $this->latitude]
                ],
                'properties' => [
                    'name' => 'Lokasi Pelanggan ' . $this->nama,
                    'address' => $this->alamat
                ]
            ]
        ];

        // Debugging output
        dd($customerData);
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
        
        // Dummy jenis pelanggan
        $this->jenisPelangganOptions = collect([
            (object)['id' => 1, 'nama' => 'Rumah Tangga'],
            (object)['id' => 2, 'nama' => 'Niaga'],
            (object)['id' => 3, 'nama' => 'Industri'],
        ]);
        
        // Dummy kelompok (jenis sambungan)
        $this->kelompokOptions = collect([
            (object)['id' => 1, 'nama' => 'Sambungan Rumah Tangga'],
            (object)['id' => 2, 'nama' => 'Sambungan Niaga'],
            (object)['id' => 3, 'nama' => 'Sambungan Industri'],
        ]);
        
        // Dummy luas bangunan
        $this->luasBangunanOptions = collect([
            (object)['id' => 1, 'nama' => '< 50 m²'],
            (object)['id' => 2, 'nama' => '50 - 100 m²'],
            (object)['id' => 3, 'nama' => '> 100 m²'],
        ]);
        
        // Dummy jenis hunian
        $this->jenisHunianOptions = collect([
            (object)['id' => 1, 'nama' => 'Rumah Tinggal'],
            (object)['id' => 2, 'nama' => 'Apartemen'],
            (object)['id' => 3, 'nama' => 'Kantor'],
        ]);
        
        // Dummy status kepemilikan
        $this->statusKepemilikanOptions = collect([
            (object)['id' => 1, 'nama' => 'Milik Sendiri'],
            (object)['id' => 2, 'nama' => 'Sewa'],
        ]);
        
        // Dummy kebutuhan air sebelumnya
        $this->kebutuhanAirOptions = collect([
            (object)['id' => 1, 'nama' => 'PDAM'],
            (object)['id' => 2, 'nama' => 'Sumur Bor'],
            (object)['id' => 3, 'nama' => 'Air Kemasan'],
        ]);
        
        // Dummy KWh PLN
        $this->kwhPlnOptions = collect([
            (object)['id' => 1, 'nama' => '450 VA'],
            (object)['id' => 2, 'nama' => '900 VA'],
            (object)['id' => 3, 'nama' => '1300 VA'],
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

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.customer-form');
    }
}