@extends('layouts.master')

@section('title')
    Data Kendaraaan
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Kendaraan</li>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('dashboard.kendaraan.create') }}" class="btn btn-success btn-sm"><i
                                        class="fa fa-plus-circle"></i> Tambah</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-stiped table-bordered" id="user-table">
                                <thead>
                                    <tr>
                                        <th width="6%">No</th>
                                        <th>Nomor Polisi</th>
                                        <th>Jenis kendaraan</th>
                                        <th>Nama Supir</th>
                                        <th>Telepon Supir</th>
                                        <th width="15%"><i class="fa fa-cog"></i></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        // Memuat jQuery dalam mode noConflict
        var $j = jQuery.noConflict();

        // Menggunakan $j untuk menghindari bentrok
        $j(function() {
            var table = $j('#user-table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route('dashboard.kendaraan.data') }}',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'nomor_polisi'
                    },
                    {
                        data: 'jenis_kendaraan'
                    },
                    {
                        data: 'nama_supir'
                    },
                    {
                        data: 'telepon_supir'
                    },
                    {
                        data: 'aksi',
                        searchable: false,
                        sortable: false
                    },
                ]
            });
        });
    </script>
@endpush
