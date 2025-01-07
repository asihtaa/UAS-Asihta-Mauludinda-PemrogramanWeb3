@extends('layouts.master')

@section('title')
    Tambah Pelanggan
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">Master Data</li>
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.pelanggan.index') }}" style="color: black;">Pelanggan</a>
    </li>
    <li class="breadcrumb-item active">Tambah Pelanggan</li>
@endsection

@section('content')
    @include('layouts.alert')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Pelanggan</h3>
                        </div>
                        <!-- form store -->
                        <form action="{{ route('dashboard.pelanggan.store') }}" method="POST" enctype="multipart/form-data"
                            id="userForm">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Pelanggan<span class="text-danger">*</span></label>
                                    <input type="nama" name="nama" class="form-control" id="nama"
                                        placeholder="Enter Nama Pelanggan" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="alamat">Alamat<span class="text-danger">*</span></label>
                                    <input type="alamat" name="alamat" class="form-control" id="alamat"
                                        placeholder="Enter Keterangan" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="telepon">No. Telepon <span class="text-danger">*</span></label>
                                    <input type="telepon" name="telepon" class="form-control" id="telepon"
                                        placeholder="Enter Harga Per Ton" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="email">Email<span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Enter Email" required>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                                <a href="{{ route('dashboard.pelanggan.index') }}" class="btn btn-danger">Kembali</a>
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
