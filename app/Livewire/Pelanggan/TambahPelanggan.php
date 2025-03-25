<?php

namespace App\Livewire\Pelanggan;

use App\Models\Pelanggan;
use App\Models\AreaDistrik;
use App\Models\SubAreaDistrik;
use App\Models\Kecamatan;
use App\Models\Desa;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;

class TambahPelanggan extends Component
{
    use WithFileUploads;

    public $pelanggan;
    public $distrik_id;
    public $sub_area_distrik_id;
    public $kecamatan_id;
    public $desa_id;
    public $kecamatan_input;
    public $desa_input;
    public $alamat;
    public $jenis_pelanggan;
    public $kelompok;
    public $nik;
    public $nama_lengkap;
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
    public $dokumen_ktp;
    public $dokumen_kk;
    public $dokumen_pbb;
    public $no_telepon;
    public $latitude;
    public $longitude;
    public $status = 1;

    public $nomorPelanggan;
    public $nomorMeteran;

    // Data untuk select options
    public $distrikOptions = [];
    public $subAreaDistrikOptions = [];
    public $kecamatanOptions = [];
    public $desaOptions = [];

    public $luasBangunanOptions = [
        ['id' => 1, 'nama' => 'Kecil (<30 m²)'],
        ['id' => 2, 'nama' => 'Sedang (30-60 m²)'],
        ['id' => 3, 'nama' => 'Besar (>60 m²)'],
    ];

    public $jenisHunianOptions = [
        ['id' => 1, 'nama' => 'Rumah Tinggal'],
        ['id' => 2, 'nama' => 'Ruko'],
        ['id' => 3, 'nama' => 'Kantor'],
        ['id' => 4, 'nama' => 'Industri'],
    ];

    public $statusKepemilikanOptions = [
        ['id' => 1, 'nama' => 'Milik Sendiri'],
        ['id' => 2, 'nama' => 'Sewa'],
        ['id' => 3, 'nama' => 'Kontrak'],
    ];

    public $kebutuhanAirOptions = [
        ['id' => 1, 'nama' => 'Sumur Pribadi'],
        ['id' => 2, 'nama' => 'Air Kemasan'],
        ['id' => 3, 'nama' => 'PDAM Lain'],
    ];

    public $kwhPlnOptions = [
        ['id' => 1, 'nama' => '450 VA'],
        ['id' => 2, 'nama' => '900 VA'],
        ['id' => 3, 'nama' => '1300 VA'],
        ['id' => 4, 'nama' => '2200 VA'],
        ['id' => 5, 'nama' => '>3500 VA'],
    ];

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pelanggan.tambah-pelanggan', [
            'distrikOptions' => $this->distrikOptions,
            'subAreaDistrikOptions' => $this->subAreaDistrikOptions,
            'kecamatanOptions' => $this->kecamatanOptions,
            'desaOptions' => $this->desaOptions,
        ]);
    }

    public function mount($pelangganId = null)
    {
        // Load semua data sekaligus
        $this->distrikOptions = AreaDistrik::all();
        $this->subAreaDistrikOptions = SubAreaDistrik::all();
        $this->kecamatanOptions = Kecamatan::all();
        $this->desaOptions = Desa::all();
        if ($pelangganId) {
            $this->pelanggan = Pelanggan::with(['areaDistrik', 'subAreaDistrik', 'kecamatan', 'desa'])
                ->findOrFail($pelangganId);
            $this->isiDataDariPelanggan();
            $this->nomorPelanggan = $this->pelanggan->nomor_pelanggan; // load dari database
            $this->nomorMeteran = $this->pelanggan->nomor_meteran;     // load dari database
        } else {
            $this->generateNomorPelanggan(); // generate baru
            $this->generateNomorMeteran();   // generate baru
        }
    }

    protected function loadOptions()
    {
        $this->distrikOptions = AreaDistrik::all();
        $this->subAreaDistrikOptions = SubAreaDistrik::all();
        $this->kecamatanOptions = Kecamatan::all();
        $this->desaOptions = Desa::all();
    }

    protected function isiDataDariPelanggan()
    {
        $this->distrik_id = $this->pelanggan->area_distrik_id;
        $this->sub_area_distrik_id = $this->pelanggan->sub_area_distrik_id;
        $this->kecamatan_id = $this->pelanggan->kecamatan_id;
        $this->desa_id = $this->pelanggan->desa_id;
        $this->kelompok = $this->pelanggan->kategori_id;
        $this->alamat = $this->pelanggan->alamat;
        $this->jenis_pelanggan = $this->pelanggan->jenis_pelanggan;
        $this->nik = $this->pelanggan->nik;
        $this->nama_lengkap = $this->pelanggan->nama;
        $this->pekerjaan = $this->pelanggan->pekerjaan;
        $this->rt = $this->pelanggan->rt;
        $this->rw = $this->pelanggan->rw;
        $this->no_rumah = $this->pelanggan->nomor_rumah;
        $this->gang = $this->pelanggan->gang;
        $this->blok = $this->pelanggan->blok;
        $this->luas_bangunan = $this->pelanggan->luas_bangunan;
        $this->jenis_hunian = $this->pelanggan->jenis_hunian;
        $this->status_kepemilikan = $this->pelanggan->status_kepemilikan;
        $this->kebutuhan_air_sebelumnya = $this->pelanggan->kebutuhan_air_awal;
        $this->kran_diminta = $this->pelanggan->kran_diminta;
        $this->kwh_pln = $this->pelanggan->kwh_pln;
        $this->no_telepon = $this->pelanggan->nomor_telp;
        $this->latitude = $this->pelanggan->latitude;
        $this->longitude = $this->pelanggan->longitude;
    }

    public function rules()
    {
        return [
            'distrik_id' => 'required|integer|exists:area_distrik,id',
            'sub_area_distrik_id' => 'required|integer|exists:sub_area_distrik,id',
            'kecamatan_id' => 'required_without:kecamatan_input|integer|exists:kecamatan,id',
            'desa_id' => 'required_without:desa_input|integer|exists:desa,id',
            // 'kecamatan_input' => 'required_without:kecamatan_id|string|max:255',
            // 'desa_input' => 'required_without:desa_id|string|max:255',
            'alamat' => 'required|string',
            'jenis_pelanggan' => 'required|string|max:255',
            'kelompok' => 'required|exists:kategori,id',
            'nik' => 'required|numeric|digits:16|unique:pelanggan,nik' . ($this->pelanggan ? ',' . $this->pelanggan->id : ''),
            'nama_lengkap' => 'required|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
            'rt' => 'nullable|numeric|digits_between:1,3',
            'rw' => 'nullable|numeric|digits_between:1,3',
            'no_rumah' => 'nullable|string|max:20',
            'gang' => 'nullable|string|max:255',
            'blok' => 'nullable|string|max:255',
            'luas_bangunan' => 'required|numeric',
            'jenis_hunian' => 'required|string|max:255',
            'status_kepemilikan' => 'required|string|max:255',
            'kebutuhan_air_sebelumnya' => 'required|numeric',
            'kran_diminta' => 'nullable|integer',
            'kwh_pln' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'dokumen_ktp' => 'nullable|image|max:2048',
            'dokumen_kk' => 'nullable|image|max:2048',
            'dokumen_pbb' => 'nullable|file|mimes:pdf|max:2048',
            'nomorPelanggan' => 'required|string|max:255', // ubah ke camelCase
            'nomorMeteran' => 'required|string|max:255',  // ubah ke camelCase
            'no_telepon' => 'required|numeric|digits_between:10,15', // perbaiki penamaan
        ];
    }

    public function save()
    {   
        try {
            $validatedData = $this->validate($this->rules());

            // Mapping data untuk disimpan
            $dataToSave = [
                'area_distrik_id' => $this->distrik_id,
                'sub_area_distrik_id' => $this->sub_area_distrik_id,
                'kecamatan_id' => $this->kecamatan_id,
                'desa_id' => $this->desa_id,
                'kategori_id' => $this->kelompok,
                'jenis_pelanggan' => $this->jenis_pelanggan,
                'nama' => $this->nama_lengkap,
                'nik' => $this->nik,
                'alamat' => $this->alamat,
                'pekerjaan' => $this->pekerjaan,
                'rt' => $this->rt,
                'rw' => $this->rw,
                'nomor_rumah' => $this->no_rumah,
                'gang' => $this->gang,
                'blok' => $this->blok,
                'jenis_hunian' => $this->jenis_hunian,
                'luas_bangunan' => (float)$this->luas_bangunan,
                'kebutuhan_air_awal' => (int)$this->kebutuhan_air_sebelumnya,
                'kran_diminta' => (int)$this->kran_diminta,
                'kwh_pln' => $this->kwh_pln,
                'status_kepemilikan' => $this->status_kepemilikan,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'nomor_telp' => $this->no_telepon, 
                'nomor_pelanggan' => $this->nomorPelanggan, 
                'nomor_meteran' => $this->nomorMeteran,       
                'status' => $this->status, 
            ];

            // Handle file uploads
            if ($this->dokumen_ktp) {
                $dataToSave['file_ktp'] = $this->dokumen_ktp->store('pelanggan/ktp', 'public');
            }
            if ($this->dokumen_kk) {
                $dataToSave['file_kk'] = $this->dokumen_kk->store('pelanggan/kk', 'public');
            }
            if ($this->dokumen_pbb) {
                $dataToSave['file_sertifikat'] = $this->dokumen_pbb->store('pelanggan/sertifikat', 'public');
            }

            // Check if we're updating or creating new
            if ($this->pelanggan) {
                // Update existing record
                $pelanggan = Pelanggan::find($this->pelanggan->id);
                if (!$pelanggan) {
                    throw new \Exception('Pelanggan tidak ditemukan untuk diperbarui');
                }
                
                $pelanggan->update($dataToSave);
                session()->flash('success', 'Data pelanggan berhasil diperbarui');
            } else {
                $dataToSave['status'] = 1;
                $pelanggan = new Pelanggan($dataToSave);
                $pelanggan->save();
                session()->flash('success', 'Pelanggan baru berhasil ditambahkan');
            }

            $this->resetForm();

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation errors
            session()->flash('error', 'Validasi gagal: ' . $e->getMessage());
             // Handle validation errors
            session()->flash('error', 'Validasi gagal: ' . $e->getMessage());
            return back()->withErrors($e->errors());
        } catch (\Exception $e) {
            // Other errors - show detailed error message
            dd([
                'error_message' => $e->getMessage(),
                'error_trace' => $e->getTraceAsString(),
                'input_data' => $this->all(),
                'data_to_save' => $dataToSave ?? null,
            ]);
            
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }

    protected function generateNomorPelanggan()
    {
        $count = Pelanggan::count() + 1;
        $this->nomorPelanggan = 'PLG-' . date('Ym') . str_pad($count, 5, '0', STR_PAD_LEFT);
        return $this->nomorPelanggan; // tambahkan return
    }

    protected function generateNomorMeteran()
    {
        $count = Pelanggan::count() + 1;
        $this->nomorMeteran = 'MTR-' . date('Ym') . str_pad($count, 5, '0', STR_PAD_LEFT);
        return $this->nomorMeteran; // tambahkan return
    }

    public function cancel()
    {
        return redirect()->route('pelanggan.index');
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
        $this->loadOptions();
    }

    // public function saveDummyData(){
    //     try {
    //         // Mapping data dummy ke struktur database
    //         $pelanggan = new Pelanggan();
            
    //         // Field relasi
    //         $pelanggan->area_distrik_id = $this->dummyData['distrik_id'];
    //         $pelanggan->sub_area_distrik_id = $this->dummyData['sub_area_distrik_id'];
    //         $pelanggan->kecamatan_id = $this->dummyData['kecamatan_id'];
    //         $pelanggan->desa_id = $this->dummyData['desa_id'];
    //         $pelanggan->kategori_id = $this->dummyData['kelompok'];
            
    //         // Field utama
    //         $pelanggan->jenis_pelanggan = $this->dummyData['jenis_pelanggan'];
    //         $pelanggan->nama = $this->dummyData['nama_lengkap'];
    //         $pelanggan->nik = $this->dummyData['nik'];
    //         $pelanggan->alamat = $this->dummyData['alamat'];
    //         // $pelanggan->pekerjaan = $this->dummyData['pekerjaan'];
            
    //         // Field alamat detail
    //         $pelanggan->rt = $this->dummyData['rt'];
    //         $pelanggan->rw = $this->dummyData['rw'];
    //         $pelanggan->nomor_rumah = $this->dummyData['no_rumah'];
    //         $pelanggan->gang = $this->dummyData['gang'];
    //         $pelanggan->blok = $this->dummyData['blok'];
            
    //         // Field teknis
    //         $pelanggan->luas_bangunan = $this->dummyData['luas_bangunan'];
    //         $pelanggan->jenis_hunian = $this->dummyData['jenis_hunian'];
    //         $pelanggan->status_kepemilikan = $this->dummyData['status_kepemilikan'];
    //         $pelanggan->kebutuhan_air_awal = $this->dummyData['kebutuhan_air_sebelumnya'];
    //         $pelanggan->kran_diminta = $this->dummyData['kran_diminta'];
    //         $pelanggan->kwh_pln = $this->dummyData['kwh_pln'];
            
    //         // Field kontak
    //         $pelanggan->nomor_telp = $this->dummyData['no_telepon'];
            
    //         // Field koordinat
    //         $pelanggan->latitude = $this->dummyData['latitude'];
    //         $pelanggan->longitude = $this->dummyData['longitude'];
            
    //         // Generate nomor unik
    //         $pelanggan->nomor_pelanggan = $this->generateNomorPelanggan();
    //         $pelanggan->nomor_meteran = $this->generateNomorMeteran();
            
    //         // Simpan ke database
    //         // dd($pelanggan);
    //         $pelanggan->save();
    //         // dd('berhasil');
    //         session()->flash('success', 'Data dummy pelanggan berhasil disimpan!');
    //         return redirect()->route('pelanggan.index');
            
    //     } catch (\Exception $e) {
    //         dd($e->getMessage(), $e->getTrace()); // Tampilkan error detail
    //         session()->flash('error', 'Gagal menyimpan data dummy: ' . $e->getMessage());
    //     }
    // }
}