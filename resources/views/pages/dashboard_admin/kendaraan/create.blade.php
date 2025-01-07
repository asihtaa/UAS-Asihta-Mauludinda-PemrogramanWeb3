@extends('layouts.master')

@section('title')
    Tambah Kendaraan
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.kendaraan.index') }}" style="color: black;">Kendaraan</a>
    </li>
    <li class="breadcrumb-item active">Tambah Kendaraan</li>
@endsection

@section('content')
    @include('layouts.alert')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Kendaraan</h3>
                        </div>
                        <!-- form store -->
                        <form action="{{ route('dashboard.kendaraan.store') }}" method="POST" enctype="multipart/form-data"
                            id="userForm">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nomor_polisi">Nomor Polisi<span class="text-danger">*</span></label>
                                    <input type="nomor_polisi" name="nomor_polisi" class="form-control" id="nomor_polisi"
                                        placeholder="Enter Nomor Polisi" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="jenis_kendaraan">Jenis Kendaraan<span class="text-danger">*</span></label>
                                    <input type="jenis_kendaraan" name="jenis_kendaraan" class="form-control" id="jenis_kendaraan"
                                        placeholder="Enter Jenis Kendaraan" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_supir">Nama Supir<span class="text-danger">*</span></label>
                                    <input type="nama_supir" name="nama_supir" class="form-control" id="nama_supir"
                                        placeholder="Nama Supir" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="telepon_supir">Telepon Supir<span class="text-danger">*</span></label>
                                    <input type="telepon_supir" name="telepon_supir" class="form-control" id="telepon_supir"
                                        placeholder="Telepon Supir" required>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                                <a href="{{ route('dashboard.kendaraan.index') }}" class="btn btn-danger">Kembali</a>
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
@endpush
