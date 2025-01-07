@extends('layouts.master')

@section('title')
    Edit Gudang
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">Master Data</li>
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.gudang.index') }}" style="color: black;">Gudang</a>
    </li>
    <li class="breadcrumb-item active">Edit Gudang</li>
@endsection

@section('content')
    @include('layouts.alert')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Gudang</h3>
                        </div>
                        <!-- form update -->
                        <form action="{{ route('dashboard.gudang.update', [$gudang->id]) }}" method="POST"
                            enctype="multipart/form-data" id="editForm">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Gudang<span class="text-danger">*</span></label>
                                    <input type="nama" name="nama" class="form-control" id="nama"
                                    value="{{ $gudang->nama }}" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="lokasi">Lokasi<span class="text-danger">*</span></label>
                                    <input type="lokasi" name="lokasi" class="form-control" id="lokasi"
                                    value="{{ $gudang->lokasi }}"required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="pengawas">Pengawas<span class="text-danger">*</span></label>
                                    <input type="pengawas" name="pengawas" class="form-control" id="pengawas"
                                    value="{{ $gudang->pengawas }}" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="telepon">Telepon<span class="text-danger">*</span></label>
                                    <input type="telepon" name="telepon" class="form-control" id="telepon"
                                    value="{{ $gudang->telepon }}" required>
                                </div>
                            </div>

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                                <a href="{{ route('dashboard.gudang.index') }}" class="btn btn-danger">Kembali</a>
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
