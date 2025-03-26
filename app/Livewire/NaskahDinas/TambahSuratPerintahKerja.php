<?php

namespace App\Livewire\NaskahDinas;

use Livewire\Component;
use App\Models\Vendor;
use App\Models\SuratPerintahKerja;
use App\Models\Pelanggan; // Add this import
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

    protected $rules = [
        'nomor_surat' => 'required|unique:surat_perintah_kerja,nomor_surat',
        'tanggal_surat' => 'required|date',
        'kepada' => 'required|exists:vendor,id',
        'perihal' => 'required|in:pemasangan_sambungan_baru,pemeliharaan_sambungan,perbaikan_meter',
        'nomor_permohonan' => 'required|exists:pelanggan,id',
        'waktu_kerja' => 'required|integer|min:1',
        'keterangan' => 'nullable|string',
    ];

    public function mount()
    {
        $this->vendorList = Vendor::select('id', 'nama_vendor', 'alamat', 'telepon')->get()->toArray();
        
        // Get paid customers for permohonan list
        $this->permohonanList = Pelanggan::where('status', 'paid')
            ->select('id', 'nomor_pelanggan as nomor_permohonan', 'nama_pelanggan', 'alamat', 'nomor_telp', DB::raw("CONCAT(latitude, ',', longitude) as koordinat"))
            ->get()
            ->map(function($item) {
                return [
                    'id' => $item->id,
                    'nomor_permohonan' => $item->nomor_permohonan,
                    'nama_pemohon' => $item->nama_pelanggan,
                    'alamat' => $item->alamat,
                    'telepon' => $item->nomor_telp,
                    'koordinat' => $item->koordinat
                ];
            })->toArray();
            
        $this->tanggal_surat = now()->format('Y-m-d');
    }

    public function loadVendorData()
    {
        $vendor = collect($this->vendorList)->firstWhere('id', $this->kepada);
        if ($vendor) {
            $this->alamat_vendor = $vendor['alamat'];
            $this->nomor_telp_pemohon = $vendor['telepon'] ?? '';
        } else {
            $this->alamat_vendor = '';
        }
    }

    public function loadPelangganData()
    {
        $permohonan = collect($this->permohonanList)->firstWhere('id', $this->nomor_permohonan);
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
                'pelanggan_id' => $this->nomor_permohonan,
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
        $this->permohonanList = Pelanggan::where('status', 'paid')
            ->select('id', 'nomor_pelanggan as nomor_permohonan', 'nama_pelanggan', 'alamat', 'nomor_telp', DB::raw("CONCAT(latitude, ',', longitude) as koordinat"))
            ->get()
            ->map(function($item) {
                return [
                    'id' => $item->id,
                    'nomor_permohonan' => $item->nomor_permohonan,
                    'nama_pemohon' => $item->nama_pelanggan,
                    'alamat' => $item->alamat,
                    'telepon' => $item->nomor_telp,
                    'koordinat' => $item->koordinat
                ];
            })->toArray();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.naskah-dinas.tambah-surat-perintah-kerja');
    }
}