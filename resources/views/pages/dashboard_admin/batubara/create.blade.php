@extends('layouts.master')

@section('title')
    Tambah Batubara
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">Master Data Barang</li>
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.batubara.index') }}" style="color: black;">Batu Bara</a>
    </li>
    <li class="breadcrumb-item active">Tambah Batubara</li>
@endsection

@section('content')
    @include('layouts.alert')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Batubara</h3>
                        </div>
                        <!-- form store -->
                        <form action="{{ route('dashboard.batubara.store') }}" method="POST" enctype="multipart/form-data"
                            id="userForm">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="HBA">Harga Acuan Batubara<span class="text-danger">*</span></label>
                                    <input type="HBA" name="HBA" class="form-control" id="HBA"
                                        placeholder="Enter Harga Acuan Batubara" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kalori">Kalori<span class="text-danger">*</span></label>
                                    <input type="kalori" name="kalori" class="form-control" id="kalori"
                                        placeholder="Enter Keterangan" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="harga_per_ton">Harga Per Ton / Rupiah <span class="text-danger">*</span></label>
                                    <input type="harga_per_ton" name="harga_per_ton" class="form-control" id="harga_per_ton"
                                        placeholder="Enter Harga Per Ton" required>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                                <a href="{{ route('dashboard.batubara.index') }}" class="btn btn-danger">Kembali</a>
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
