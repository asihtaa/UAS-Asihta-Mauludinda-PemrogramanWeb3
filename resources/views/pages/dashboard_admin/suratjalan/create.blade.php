@extends('layouts.master')

@section('title')
    Tambah Surat Jalan
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">Master Data</li>
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.pelanggan.index') }}" style="color: black;">Surat Jalan</a>
    </li>
    <li class="breadcrumb-item active">Tambah Surat Jalan</li>
@endsection

@section('content')
    @include('layouts.alert')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Surat Jalan</h3>
                        </div>
                        <!-- form store -->
                        <form action="{{ route('dashboard.suratjalan.store') }}" method="POST" enctype="multipart/form-data"
                            id="userForm">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nomor_surat">Nomor Surat<span class="text-danger">*</span></label>
                                    <input type="nomor_surat" name="nomor_surat" class="form-control" id="nomor_surat"
                                        placeholder="Enter Nomor Surat" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tanggal_surat">Tanggal Surat<span class="text-danger">*</span></label>
                                    <input type="date" name="tanggal_surat" class="form-control" id="alatanggal_suratmat"
                                         required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                <label>Select Kendaraan</label>
                                <select name="id_kendaraan" id="id_kendaraan" class="form-control" required>
                                    <option value="">Select Kendaraan</option>
                                    @foreach($kendaraan as $kendaraan)
                                        <option value="{{ $kendaraan->id }}">{{ $kendaraan->jenis_kendaraan }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                <label>SelecPiliht Pelanggan</label>
                                <select name="id_pelanggan" id="id_pelanggan" class="form-control" required>
                                    <option value="">Select Pelanggan</option>
                                    @foreach($pelanggan as $pelanggan)
                                        <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                <label>Pilih Kalori</label>
                                <select name="id_jenis_batu_bara" id="id_jenis_batu_bara" class="form-control" required>
                                    <option value="">Select Batubara</option>
                                @foreach($batubara as $batubara)
                                <option value="{{ $batubara->id }}" 
                                    data-price="{{ $batubara->harga_per_ton }}"
                                    {{ old('id_jenis_batu_bara') == $batubara->id ? 'selected' : '' }}>
                                    {{ $batubara->kalori }} ( Rp.  {{ number_format($batubara->harga_per_ton, 2) }}/ton )
                                </option>
                                @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                <label>Pilih Lokasi Gudang</label>
                                <select name="id_gudang" id="id_gudang" class="form-control" required>
                                    <option value="">Pilih Gudang</option>
                                    @foreach($gudang as $gudang)
                                        <option value="{{ $gudang->id }}">{{ $gudang->lokasi }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="jumlah_ton">Jumlah Ton<span class="text-danger">*</span></label>
                                    <input type="jumlah_ton" name="jumlah_ton" class="form-control" id="jumlah_ton"
                                        placeholder="Enter Jumlah Ton" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="total_harga">Total Harga<span class="text-danger">*</span></label>
                                    <input type="total_harga" name="total_harga" class="form-control" id="total_harga"
                                        placeholder="Enter Total Harga" required>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                                <a href="{{ route('dashboard.suratjalan.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- Show Password -->
    <script>
        const passwordInput = document.getElementById("password");
        const showPasswordButton = document.getElementById("showPasswordButton");

        showPasswordButton.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPasswordButton.textContent = "Sembunyikan";
            } else {
                passwordInput.type = "password";
                showPasswordButton.textContent = "Tampilkan";
            }
        });
    </script>

    <!-- Disable submit pada saat kliknya doubel -->
    <script>
        document.getElementById('userForm').addEventListener('submit', function() {
            document.getElementById('submitButton').setAttribute('disabled', 'true');
        });
    </script>
    <script>
        // Calculate total amount automatically
        document.getElementById('id_jenis_batu_bara').addEventListener('change', calculateTotal);
        document.getElementById('jumlah_ton').addEventListener('input', calculateTotal);

        function calculateTotal() {
            const jumlah_ton = document.getElementById('jumlah_ton').value;
            const selectedOption = document.getElementById('id_jenis_batu_bara').selectedOptions[0];
            const pricePerTon = selectedOption.dataset.price;
            
            if (jumlah_ton && pricePerTon) {
                const total = jumlah_ton * pricePerTon;
                document.getElementById('total_harga').value = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(total);
            }
        }
    </script>
@endpush
