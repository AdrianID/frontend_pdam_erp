<?php

namespace App\Livewire\NaskahDinas;

use Livewire\Component;
use App\Models\Vendor;
use App\Models\SuratPerintahKerja;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;

class TambahSuratPerintahKerja extends Component
{
    public $nomor_surat;
    public $tanggal_surat;
    public $kepada;
    public $alamat_vendor;
    public $perihal;
    public $nomor_permohonan;
    public $nama_pemohon;
    public $alamat_pemohon;
    public $nomor_telp_pemohon;
    public $titik_koordinat;
    public $waktu_kerja;
    public $masa_kerja;
    public $keterangan;
    
    public $vendorList = [];
    public $permohonanList = [];

    // Dummy data for permohonan
    protected $dummyPermohonan = [
        [
            'id' => 1,
            'nomor_permohonan' => 'Permohonan-001',
            'nama_pemohon' => 'John Doe',
            'alamat' => 'Jl. Merdeka No. 123, Jakarta',
            'telepon' => '081234567890',
            'koordinat' => '-6.175392, 106.827153',
        ],
        [
            'id' => 2,
            'nomor_permohonan' => 'Permohonan-002',
            'nama_pemohon' => 'Jane Smith',
            'alamat' => 'Jl. Sudirman No. 456, Jakarta',
            'telepon' => '082345678901',
            'koordinat' => '-6.225013, 106.800446',
        ],
        [
            'id' => 3,
            'nomor_permohonan' => 'Permohonan-003',
            'nama_pemohon' => 'Robert Johnson',
            'alamat' => 'Jl. Thamrin No. 789, Jakarta',
            'telepon' => '083456789012',
            'koordinat' => '-6.186486, 106.834091',
        ],
        [
            'id' => 4,
            'nomor_permohonan' => 'Permohonan-004',
            'nama_pemohon' => 'Sarah Williams',
            'alamat' => 'Jl. Gatot Subroto No. 321, Jakarta',
            'telepon' => '084567890123',
            'koordinat' => '-6.221830, 106.819500',
        ],
        [
            'id' => 5,
            'nomor_permohonan' => 'Permohonan-005',
            'nama_pemohon' => 'Michael Brown',
            'alamat' => 'Jl. HR Rasuna Said No. 654, Jakarta',
            'telepon' => '085678901234',
            'koordinat' => '-6.224015, 106.833156',
        ],
    ];

    protected $rules = [
        'nomor_surat' => 'required|unique:surat_perintah_kerja,nomor_surat',
        'tanggal_surat' => 'required|date',
        'kepada' => 'required|exists:vendor,id',
        'perihal' => 'required|in:pemasangan_sambungan_baru,pemeliharaan_sambungan,perbaikan_meter',
        'nomor_permohonan' => 'required|numeric',
        'waktu_kerja' => 'required|integer|min:1',
        'keterangan' => 'nullable|string',
    ];

    public function mount()
    {
        $this->vendorList = Vendor::select('id', 'nama_vendor', 'alamat', 'telepon')->get()->toArray();
        $this->permohonanList = array_map(function($item) {
            return ['id' => $item['id'], 'nomor_permohonan' => $item['nomor_permohonan']];
        }, $this->dummyPermohonan);
        $this->tanggal_surat = now()->format('Y-m-d');
    }

    public function loadVendorData()
    {
        $vendor = collect($this->vendorList)->firstWhere('id', $this->kepada);
        if ($vendor) {
            $this->alamat_vendor = $vendor['alamat'];
            $this->nomor_telp_pemohon = $vendor['telepon'] ?? ''; // Using vendor's phone if needed
        } else {
            $this->alamat_vendor = '';
        }
    }

    public function loadPelangganData()
    {
        $permohonan = collect($this->dummyPermohonan)->firstWhere('id', $this->nomor_permohonan);
        if ($permohonan) {
            $this->nama_pemohon = $permohonan['nama_pemohon'];
            $this->alamat_pemohon = $permohonan['alamat'];
            $this->nomor_telp_pemohon = $permohonan['telepon'];
            $this->titik_koordinat = $permohonan['koordinat'];
        } else {
            $this->reset(['nama_pemohon', 'alamat_pemohon', 'nomor_telp_pemohon', 'titik_koordinat']);
        }
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['waktu_kerja', 'tanggal_surat'])) {
            $this->calculateMasaKerja();
        }
    }

    protected function calculateMasaKerja()
    {
        if ($this->tanggal_surat && $this->waktu_kerja) {
            try {
                // Ensure waktu_kerja is treated as a number
                $daysToAdd = is_numeric($this->waktu_kerja) ? (int)$this->waktu_kerja : 0;
                $masaKerja = Carbon::parse($this->tanggal_surat)->addDays($daysToAdd);
                $this->masa_kerja = $masaKerja->format('Y-m-d');
            } catch (\Exception $e) {
                $this->addError('masa_kerja', 'Gagal menghitung masa kerja');
                $this->masa_kerja = '';
            }
        } else {
            $this->masa_kerja = '';
        }
    }

    public function save()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            $spk = SuratPerintahKerja::create([
                'nomor_surat' => $this->nomor_surat,
                'tanggal_surat' => $this->tanggal_surat,
                'vendor_id' => $this->kepada,
                'alamat_vendor' => $this->alamat_vendor,
                'perihal' => $this->perihal,
                // 'permohonan_id' => $this->nomor_permohonan,
                'nama_pemohon' => $this->nama_pemohon,
                'alamat_pemohon' => $this->alamat_pemohon,
                'nomor_telp_pemohon' => $this->nomor_telp_pemohon,
                'titik_koordinat' => $this->titik_koordinat,
                'waktu_kerja' => $this->waktu_kerja,
                'masa_kerja' => $this->masa_kerja,
                'keterangan' => $this->keterangan,
                'status' => 'draft',
            ]);

            DB::commit();

            session()->flash('message', [
                'type' => 'success',
                'text' => 'Surat Perintah Kerja berhasil dibuat dan dikirim untuk persetujuan.'
            ]);

            return redirect()->route('naskah-dinas.surat-perintah-kerja');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('message', [
                'type' => 'error',
                'text' => 'Gagal membuat Surat Perintah Kerja: ' . $e->getMessage()
            ]);
        }
    }

    public function resetForm()
    {
        $this->reset();
        $this->tanggal_surat = now()->format('Y-m-d');
        $this->vendorList = Vendor::select('id', 'nama_vendor', 'alamat', 'telepon')->get()->toArray();
        $this->permohonanList = array_map(function($item) {
            return ['id' => $item['id'], 'nomor_permohonan' => $item['nomor_permohonan']];
        }, $this->dummyPermohonan);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.naskah-dinas.tambah-surat-perintah-kerja');
    }
}