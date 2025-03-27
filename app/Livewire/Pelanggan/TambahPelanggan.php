<?php

namespace App\Livewire\Pelanggan;

use App\Models\User;
use App\Models\Pelanggan;
use App\Models\AreaDistrik;
use App\Models\SubAreaDistrik;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Kategori;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Hash;

class TambahPelanggan extends Component
{
    use WithFileUploads;

    // Properti untuk data Pelanggan
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
    public $nama_pelanggan;
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
    // public $latitude;
    // public $longitude;
    public $nomorPelanggan;
    public $nomorMeteran;
    public $nomor_kk;

    // Properti untuk data User
    public $username;
    public $email;
    public $password;
    public $password_confirmation;
    public $role_id = 3; // Default role untuk pelanggan
    public $status = 'active';
    public $name;

    // Data untuk select options
    public $distrikOptions = [];
    public $subAreaDistrikOptions = [];
    public $kecamatanOptions = [];
    public $desaOptions = [];
    public $luasBangunanOptions = [];
    public $jenisHunianOptions = [];
    public $statusKepemilikanOptions = [];
    public $kebutuhanAirOptions = [];
    public $kwhPlnOptions = [];

    public $latitude = -6.2088;
    public $longitude = 106.8456;
    
    protected $listeners = ['updateMapPosition'];
    
    public function updateMapPosition($lat, $lng)
    {
        $this->latitude = $lat;
        $this->longitude = $lng;
    }
    #[Layout('layouts.app')]
    public function render()
    {
        $kategori = Kategori::all();
        return view('livewire.pelanggan.tambah-pelanggan', [
            'distrikOptions' => $this->distrikOptions,
            'subAreaDistrikOptions' => $this->subAreaDistrikOptions,
            'kecamatanOptions' => $this->kecamatanOptions,
            'desaOptions' => $this->desaOptions,
            'kategoriOptions' => $kategori,
        ]);
    }

    public function mount($pelangganId = null)
    {
        $this->loadOptions();

        if ($pelangganId) {
            $this->pelanggan = Pelanggan::with(['areaDistrik', 'subAreaDistrik', 'kecamatan', 'desa'])
                ->findOrFail($pelangganId);
            $this->isiDataDariPelanggan();
            $this->nomorPelanggan = $this->pelanggan->nomor_pelanggan;
            $this->nomorMeteran = $this->pelanggan->nomor_meteran;
            
            // Jika ada user terkait, isi data user
            if ($this->pelanggan->user) {
                $user = $this->pelanggan->user;
                $this->username = $user->username;
                $this->name = $user->name;
                $this->email = $user->email;
                $this->status = $user->status;
            }
        } else {
            $this->generateNomorPelanggan();
            $this->generateNomorMeteran();
            $this->status = 'pending'; // Default status untuk pelanggan baru
        }
    }

    protected function loadOptions()
    {
        $this->distrikOptions = AreaDistrik::all();
        $this->subAreaDistrikOptions = SubAreaDistrik::all();
        $this->kecamatanOptions = Kecamatan::all();
        $this->desaOptions = Desa::all();
        
        $this->luasBangunanOptions = [
            ['id' => 1, 'nama' => 'Kecil (<30 m²)'],
            ['id' => 2, 'nama' => 'Sedang (30-60 m²)'],
            ['id' => 3, 'nama' => 'Besar (>60 m²)'],
        ];

        $this->jenisHunianOptions = [
            ['id' => 1, 'nama' => 'Rumah Tinggal'],
            ['id' => 2, 'nama' => 'Ruko'],
            ['id' => 3, 'nama' => 'Kantor'],
            ['id' => 4, 'nama' => 'Industri'],
        ];

        $this->statusKepemilikanOptions = [
            ['id' => 1, 'nama' => 'Milik Sendiri'],
            ['id' => 2, 'nama' => 'Sewa'],
            ['id' => 3, 'nama' => 'Kontrak'],
        ];

        $this->kebutuhanAirOptions = [
            ['id' => 1, 'nama' => 'Sumur Pribadi'],
            ['id' => 2, 'nama' => 'Air Kemasan'],
            ['id' => 3, 'nama' => 'PDAM Lain'],
        ];

        $this->kwhPlnOptions = [
            ['id' => 1, 'nama' => '450 VA'],
            ['id' => 2, 'nama' => '900 VA'],
            ['id' => 3, 'nama' => '1300 VA'],
            ['id' => 4, 'nama' => '2200 VA'],
            ['id' => 5, 'nama' => '>3500 VA'],
        ];
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
        $this->nama_pelanggan = $this->pelanggan->nama_pelanggan;
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
        $this->nomor_kk = $this->pelanggan->nomor_kk;
    }

    public function rules()
    {
        $rules = [
            // Rules untuk Pelanggan
            'distrik_id' => 'required|integer|exists:area_distrik,id',
            'sub_area_distrik_id' => 'required|integer|exists:sub_area_distrik,id',
            'kecamatan_id' => 'required|integer|exists:kecamatan,id',
            'desa_id' => 'required|integer|exists:desa,id',
            'alamat' => 'required|string',
            'jenis_pelanggan' => 'required|string|max:255',
            'kelompok' => 'required|exists:kategori,id',
            'nik' => [
                'required',
                'numeric',
                'digits:16',
                $this->pelanggan ? 'unique:pelanggan,nik,'.$this->pelanggan->id : 'unique:pelanggan,nik'
            ],
            'nama_pelanggan' => 'required|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
            'rt' => 'required|string|max:255',
            'rw' => 'required|string|max:255',
            'no_rumah' => 'required|string|max:20',
            'gang' => 'nullable|string|max:255',
            'blok' => 'nullable|string|max:255',
            'luas_bangunan' => 'nullable|numeric',
            'jenis_hunian' => 'required|string|max:255',
            'status_kepemilikan' => 'required|string|max:255',
            'kebutuhan_air_sebelumnya' => 'required|integer',
            'kran_diminta' => 'required|numeric',
            'kwh_pln' => 'nullable|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'dokumen_ktp' => 'nullable|image|max:2048',
            'dokumen_kk' => 'nullable|image|max:2048',
            'dokumen_pbb' => 'nullable|file|mimes:pdf|max:2048',
            // 'nomorPelanggan' => '|string|max:255|unique:pelanggan,nomor_pelanggan,'.($this->pelanggan ? $this->pelanggan->id : 'NULL'),
            // 'nomorMeteran' => '|string|max:255|unique:pelanggan,nomor_meteran,'.($this->pelanggan ? $this->pelanggan->id : 'NULL'),
            'no_telepon' => 'required|string|max:255',
            'nomor_kk' => 'required|string|max:255|unique:pelanggan,nomor_kk,'.($this->pelanggan ? $this->pelanggan->id : 'NULL'),
            
            // Rules untuk User (hanya diperlukan saat membuat baru atau mengubah)
            'username' => [
                $this->pelanggan ? 'nullable' : 'required',
                'string',
                'max:255',
                $this->pelanggan && $this->pelanggan->user ? 'unique:users,username,'.$this->pelanggan->user->id : 'unique:users,username'
            ],
            'email' => [
                $this->pelanggan ? 'nullable' : 'required',
                'email',
                'max:255',
                $this->pelanggan && $this->pelanggan->user ? 'unique:users,email,'.$this->pelanggan->user->id : 'unique:users,email'
            ],
            'password' => [
                $this->pelanggan ? 'nullable' : 'required',
                'string',
                'min:8',
                'confirmed'
            ],
        ];

        return $rules;
    }

    public function save()
    {   
        try {
            $validatedData = $this->validate($this->rules());

            // Ensure nama_pelanggan is not empty
            if (empty($this->nama_pelanggan)) {
                throw new \Exception("Nama pelanggan tidak boleh kosong.");
            }

            // Mulai database transaction
            \DB::beginTransaction();

            // Data untuk Pelanggan
            $pelangganData = [
                'area_distrik_id' => $this->distrik_id,
                'sub_area_distrik_id' => $this->sub_area_distrik_id,
                'kecamatan_id' => $this->kecamatan_id,
                'desa_id' => $this->desa_id,
                'kategori_id' => $this->kelompok,
                'jenis_pelanggan' => $this->jenis_pelanggan,
                'nomor_pelanggan' => $this->nomorPelanggan,
                'nomor_meteran' => $this->nomorMeteran,
                'nomor_kk' => $this->nomor_kk,
                'nomor_telp' => $this->no_telepon,
                'nama_pelanggan' => $this->nama_pelanggan,
                'nik' => $this->nik,
                'alamat' => $this->alamat,
                'pekerjaan' => $this->pekerjaan,
                'rt' => $this->rt,
                'rw' => $this->rw,
                'nomor_rumah' => $this->no_rumah,
                'gang' => $this->gang,
                'blok' => $this->blok,
                'jenis_hunian' => $this->jenis_hunian,
                'luas_bangunan' => $this->luas_bangunan,
                'kebutuhan_air_awal' => $this->kebutuhan_air_sebelumnya,
                'kran_diminta' => $this->kran_diminta,
                'kwh_pln' => $this->kwh_pln,
                'status_kepemilikan' => $this->status_kepemilikan,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'status' => $this->status,
            ];

            // Handle file uploads untuk Pelanggan
            if ($this->dokumen_ktp) {
                $pelangganData['file_ktp'] = $this->dokumen_ktp->store('pelanggan/ktp', 'public');
            }
            if ($this->dokumen_kk) {
                $pelangganData['file_kk'] = $this->dokumen_kk->store('pelanggan/kk', 'public');
            }
            if ($this->dokumen_pbb) {
                $pelangganData['file_sertifikat'] = $this->dokumen_pbb->store('pelanggan/sertifikat', 'public');
            }

            // dd($pelangganData);
            // Simpan atau update Pelanggan
            if ($this->pelanggan) {
                $pelanggan = Pelanggan::find($this->pelanggan->id);
                $pelanggan->update($pelangganData);
            } else {
                $pelanggan = Pelanggan::create($pelangganData);
            }

            // Data untuk User
            $userData = [
                'username' => $this->username,
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role_id' => $this->role_id,
                'status' => $this->status,
                'pelanggan_id' => $pelanggan->id, // Link user to pelanggan
            ];

            // Handle user creation or update
            if ($this->pelanggan && $this->pelanggan->user) {
                $user = User::find($this->pelanggan->user->id);
                $user->update($userData);
            } else {
                User::create($userData);
            }

            // Commit transaction
            \DB::commit();

            session()->flash('success', $this->pelanggan ? 'Data pelanggan berhasil diperbarui' : 'Pelanggan baru berhasil ditambahkan');
            return redirect()->route('verifikasi.index');

        } catch (\Illuminate\Validation\ValidationException $e) {
            \DB::rollBack();
            session()->flash('error', 'Validasi gagal: ' . $e->getMessage());
            return back()->withErrors($e->errors());
        } catch (\Exception $e) {
            \DB::rollBack();
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return back();
        }
    }

    protected function generateNomorPelanggan()
    {
        $this->nomorPelanggan = null;
        // $count = Pelanggan::count() + 1;
        // $this->nomorPelanggan = 'PLG-' . date('Ym') . str_pad($count, 5, '0', STR_PAD_LEFT);
    }

    protected function generateNomorMeteran()
    {
        // $count = Pelanggan::count() + 1;
        // $this->nomorMeteran = 'MTR-' . date('Ym') . str_pad($count, 5, '0', STR_PAD_LEFT);
        $this->nomorMeteran = null;
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
}