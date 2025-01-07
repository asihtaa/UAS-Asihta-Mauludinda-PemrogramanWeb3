@extends('layouts.master')

@section('title')
    Edit Data Batubara
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item">Master Data</li>
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.batubara.index') }}" style="color: black;">Batubara</a>
    </li>
    <li class="breadcrumb-item active">Edit Batubara</li>
@endsection

@section('content')
    @include('layouts.alert')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit batubara</h3>
                        </div>
                        <!-- form update -->
                        <form action="{{ route('dashboard.batubara.update', [$batubara->id]) }}" method="POST"
                            enctype="multipart/form-data" id="editForm">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="HBA">Harga Acuan Batubara<span class="text-danger">*</span></label>
                                    <input type="HBA" name="HBA" class="form-control" id="HBA"
                                        placeholder="Enter Harga Acuan Batubara" value="{{ $batubara->HBA }}" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kalori">Kalori<span class="text-danger">*</span></label>
                                    <input type="kalori" name="kalori" class="form-control" id="kalori"
                                        placeholder="Enter Kalori" value="{{ $batubara->kalori }}" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="harga_per_ton">Harga Per Ton / Rupiah<span class="text-danger">*</span></label>
                                    <input type="harga_per_ton" name="harga_per_ton" class="form-control" id="harga_per_ton"
                                        placeholder="Enter Harga Acuan Batubara" value="{{ $batubara->harga_per_ton }}" required>
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
