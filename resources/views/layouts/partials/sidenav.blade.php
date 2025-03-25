<aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0">
    <div class="h-25">
        {{-- <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close=""></i> --}}
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700 text-center" href="{{ route('dashboard') }}">
            <img src="/assets/logopdam.png" class="inline h-full max-w-full transition-all duration-200 ease-nav-brand mx-auto" alt="main_logo">
        </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent">

    <div class="items-center block w-auto max-h-screen overflow-auto grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
            <!-- Dashboard -->
            <li class="mt-0.5 w-full">
                <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors rounded-lg hover:bg-gray-100" href="{{ route('dashboard') }}">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-gray-50 text-center">
                        <i class="fas fa-chart-line text-sm leading-normal text-blue-500"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 ease">Dashboard</span>
                </a>
            </li>

            <!-- Pelanggan -->
            <li class="mt-0.5 w-full">
                <a class="nav-link py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors rounded-lg hover:bg-gray-100" href="#">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-gray-50 text-center">
                        <i class="fas fa-users text-sm leading-normal text-blue-500"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 ease">Manajemen Pelanggan</span>
                    <i class="fas fa-chevron-down ml-auto text-xs transition-transform duration-300"></i>
                </a>
                <ul class="submenu hidden overflow-hidden transition-all duration-300">
                    <li class="pl-12 pr-4">
                        <a href="{{ route('pelanggan.tambah') }}" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-user-plus mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Tambah Pelanggan</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="{{ route('verifikasi.index') }}" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-user-check mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Verifikasi Pelanggan</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="{{ route('pelanggan.index') }}" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-address-card mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Data Induk Pelanggan</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="{{ route('pelanggan.input-master-spks') }}" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-pencil-alt mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Input Master SPKS</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-chart-line mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Monitoring Penggunaan</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Pencatatan Meter -->
            <li class="mt-0.5 w-full">
                <a class="nav-link py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors rounded-lg hover:bg-gray-100" href="#">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-gray-50 text-center">
                        <i class="fas fa-gauge-high text-sm leading-normal text-emerald-500"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 ease">Pencatatan Meter</span>
                    <i class="fas fa-chevron-down ml-auto text-xs transition-transform duration-300"></i>
                </a>
                <ul class="submenu hidden overflow-hidden transition-all duration-300">
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-list-alt mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Daftar Tagihan</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-user-tie mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Pegawai Pencatat</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-calendar-days mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Penjadwalan Pegawai</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-ban mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Pelacakan</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Tagihan -->
            <li class="mt-0.5 w-full">
                <a class="nav-link py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors rounded-lg hover:bg-gray-100" href="#">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-gray-50 text-center">
                        <i class="fas fa-file-invoice-dollar text-sm leading-normal text-orange-500"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 ease">Tagihan</span>
                    <i class="fas fa-chevron-down ml-auto text-xs transition-transform duration-300"></i>
                </a>
                <ul class="submenu hidden overflow-hidden transition-all duration-300">
                    <li class="pl-12 pr-4">
                        <a href="{{ route('tagihan.daftar-tagihan') }}" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-list mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Daftar Tagihan</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="{{ route('tagihan.menu-buat-tagihan') }}" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-file-invoice mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Buat Tagihan</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="{{ route('tagihan.sambungan-baru') }}" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-water mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Sambungan Baru</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-print mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Cetak Tagihan</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-tags mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Tarif</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-exclamation-circle mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Denda</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-user-clock mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Penjadwalan Petugas</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-user-tie mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Petugas Penagihan</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-route mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Lacak Penagihan</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-chart-pie mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Rekapitulasi</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Perawatan/Perbaikan -->
            <li class="mt-0.5 w-full">
                <a class="nav-link py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors rounded-lg hover:bg-gray-100" href="#">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-gray-50 text-center">
                        <i class="fas fa-wrench text-sm leading-normal text-red-500"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 ease">Perawatan/Perbaikan</span>
                    <i class="fas fa-chevron-down ml-auto text-xs transition-transform duration-300"></i>
                </a>
                <ul class="submenu hidden overflow-hidden transition-all duration-300">
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-tools mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Perbaikan</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-clipboard-check mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Perawatan</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-calendar-check mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Penjadwalan</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Gudang --}}
            <li class="mt-0.5 w-full">
                <a class="nav-link py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors rounded-lg hover:bg-gray-100" href="#">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-gray-50 text-center">
                        <i class="fas fa-warehouse text-sm leading-normal text-green-500"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 ease">Gudang</span>
                    <i class="fas fa-chevron-down ml-auto text-xs transition-transform duration-300"></i>
                </a>
                <ul class="submenu hidden overflow-hidden transition-all duration-300">
                    <li class="pl-12 pr-4">
                        <a href="{{ route('gudang.tambah-barang') }}" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-cubes mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Tambah Barang</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="{{ route('gudang.stok-barang') }}" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-boxes mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Stok Barang</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-truck-loading mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Penerimaan Barang</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-shipping-fast mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Pengiriman Barang</span>
                        </a>
                    </li>
                    
                </ul>
            </li>

            {{-- Naskah Dinas --}}
            <li class="mt-0.5 w-full">
                <a class="nav-link py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors rounded-lg hover:bg-gray-100" href="#">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-gray-50 text-center">
                        <i class="fas fa-file-alt text-sm leading-normal text-blue-500"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 ease">Naskah Dinas</span>
                    <i class="fas fa-chevron-down ml-auto text-xs transition-transform duration-300"></i>
                </a>
                <ul class="submenu hidden overflow-hidden transition-all duration-300">
                    <li class="pl-12 pr-4">
                        <a href="{{ route('naskah-dinas.surat-perintah-kerja') }}" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-tasks mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Surat Perintah Kerja</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-edit mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Buat Naskah Baru</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-archive mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Arsip Naskah</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Pengadaan --}}
            <li class="mt-0.5 w-full">
                <a class="nav-link py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors rounded-lg hover:bg-gray-100" href="#">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-gray-50 text-center">
                        <i class="fas fa-handshake text-sm leading-normal text-blue-500"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 ease">Pengadaan</span>
                    <i class="fas fa-chevron-down ml-auto text-xs transition-transform duration-300"></i>
                </a>
                <ul class="submenu hidden overflow-hidden transition-all duration-300">
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-plus-square mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Tambah Vendor</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="{{ route('pengadaan.menu-daftar-vendor') }}" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-list mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Daftar Vendor</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-file-contract mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Kontrak Vendor</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="mt-0.5 w-full">
                <a class="nav-link py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors rounded-lg hover:bg-gray-100" href="#">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-gray-50 text-center">
                        <i class="fas fa-wallet text-sm leading-normal text-blue-500"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 ease">Pembayaran</span>
                    <i class="fas fa-chevron-down ml-auto text-xs transition-transform duration-300"></i>
                </a>
                <ul class="submenu hidden overflow-hidden transition-all duration-300">
                    <li class="pl-12 pr-4">
                        <a href="{{ route('pembayaran.menu-sambungan-baru') }}" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-bolt mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Sambungan Baru</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-list-alt mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Daftar Pembayaran</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-calendar-alt mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Tagihan Bulanan</span>
                        </a>
                    </li>
                    <li class="pl-12 pr-4">
                        <a href="#" class="group flex items-center py-2.5 text-sm text-slate-500 hover:text-blue-500 transition-colors">
                            <i class="fas fa-history mr-2 text-xs group-hover:text-blue-500 transition-colors"></i>
                            <span>Riwayat Pembayaran</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>

<style>
    .submenu {
        max-height: 0;
        opacity: 0;
        transition: all 0.3s ease-in-out;
        visibility: hidden;
    }

    .submenu.show {
        max-height: 500px;
        opacity: 1;
        visibility: visible;
    }

    .nav-link.active .fa-chevron-down {
        transform: rotate(180deg);
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle submenu with animation
    document.querySelectorAll('.nav-link').forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();
            
            // Toggle current item without affecting others
            item.classList.toggle('active');
            const submenu = item.nextElementSibling;
            if (submenu && submenu.classList.contains('submenu')) {
                submenu.classList.toggle('show');
            }
        });
    });
});
</script> 