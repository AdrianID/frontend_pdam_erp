<?php

namespace App\Livewire\Pengadaan;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Vendor;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;

class TambahVendor extends Component
{
    use WithFileUploads;

    public $jenis_vendor;
    public $nama_vendor;
    public $alamat;
    public $nomor_telp;
    public $nomor_surat_perjanjian;
    public $tanggal_surat_perjanjian;
    public $file_surat_perjanjian;
    public $status = 'aktif';
    public $rating = 5;
    public $keterangan;
    public $email;
    public $tanggal_bergabung;

    // For tracking upload errors
    public $uploadError = null;

    protected $rules = [
        'jenis_vendor' => 'required|string',
        'nama_vendor' => 'required|string|max:255',
        'alamat' => 'required|string',
        'nomor_telp' => 'required|string|max:20',
        'nomor_surat_perjanjian' => 'required|string|unique:vendor,nomor_surat_perjanjian',
        'tanggal_surat_perjanjian' => 'required|date',
        // 'file_surat_perjanjian' => 'required|file|mimes:pdf,doc,docx|max:5120',
        'status' => 'required|in:aktif,tidak_aktif',
        'rating' => 'required|integer|min:1|max:5',
        'keterangan' => 'nullable|string',
        'email' => 'nullable|email|max:255',
        'tanggal_bergabung' => 'nullable|date',
    ];

    public function mount()
    {
        $this->tanggal_bergabung = now()->format('Y-m-d');
    }

    public function updatedFileSuratPerjanjian()
    {
        // Entire function commented out to disable file upload handling
        /*
        $this->uploadError = null;
        
        try {
            $this->validateOnly('file_surat_perjanjian');
            
            // Additional manual validation
            if ($this->file_surat_perjanjian->getSize() > 5120 * 1024) {
                throw new \Exception('Ukuran file melebihi 5MB');
            }
            
        } catch (\Exception $e) {
            $this->uploadError = $e->getMessage();
            $this->reset('file_surat_perjanjian');
        }
        */
    }

    public function resetForm()
    {
        $this->reset([
            'jenis_vendor', 'nama_vendor', 'alamat', 'nomor_telp',
            'nomor_surat_perjanjian', 'tanggal_surat_perjanjian',
            'file_surat_perjanjian', 'status', 'rating', 'keterangan',
            'email', 'tanggal_bergabung', 'uploadError'
        ]);
        $this->rating = 5;
        $this->status = 'aktif';
        $this->tanggal_bergabung = now()->format('Y-m-d');
    }

    public function save()
    {
        $this->validate();

        try {
            // Commenting out file handling in the save method
            /*
            $filename = Str::slug(pathinfo($this->file_surat_perjanjian->getClientOriginalName(), PATHINFO_FILENAME))
                       . '-' . time() 
                       . '.' . $this->file_surat_perjanjian->extension();
            
            $filePath = $this->file_surat_perjanjian->storeAs(
                'vendor_files',
                $filename,
                'public'
            );
            */

            Vendor::create([
                'jenis_vendor' => $this->jenis_vendor,
                'nama_vendor' => $this->nama_vendor,
                'alamat' => $this->alamat,
                'telepon' => $this->nomor_telp,
                'nomor_surat_perjanjian' => $this->nomor_surat_perjanjian,
                'tanggal_surat_perjanjian' => $this->tanggal_surat_perjanjian,
                // 'file_surat_perjanjian' => $filePath,
                'status' => $this->status,
                'rating' => $this->rating,
                'keterangan' => $this->keterangan,
                'email' => $this->email,
                'tanggal_bergabung' => $this->tanggal_bergabung,
            ]);

            session()->flash('success', 'Vendor berhasil ditambahkan!');
            $this->resetForm();
            return redirect()->route('pengadaan.menu-daftar-vendor');

        } catch (\Exception $e) {
            // Commenting out file deletion on error
            /*
            if (isset($filePath) && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }
            */
            
            session()->flash('error', 'Gagal menyimpan vendor: ' . $e->getMessage());
        }
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pengadaan.tambah-vendor');
    }
}