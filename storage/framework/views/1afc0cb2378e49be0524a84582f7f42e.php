<?php $__env->startSection('title'); ?>
    Laporan Perbulan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
    <li class="breadcrumb-item">Laporan</li>
    <li class="breadcrumb-item active">Laporan Perbulan</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php echo $__env->make('layouts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="date_start">Tanggal awal</label>
                                        <input type="date" class="form-control" id="date_start" name="date_start">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="date_end">Tanggal akhir</label>
                                        <input type="date" class="form-control" id="date_end" name="date_end">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="exampleInputdate2">&nbsp;</label>
                                        <button type="button" class="btn btn-primary btn-block" style="width: 100px;"
                                            id="btnSearch">Cari</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-stiped table-bordered" id="user-table">
                                <thead>
                                    <tr>
                                        <th width="6%">No</th>
                                        <th>Surat Jalan</th>
                                        <th>Tgl Surat Jalan</th>
                                        <th>Nama Pabrik</th>
                                        <th>Nama User</th>
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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
    <script>
        // Memuat jQuery dalam mode noConflict
        var $j = jQuery.noConflict();

        // // Menggunakan $j untuk menghindari bentrok
        // $j(function() {
        //     var table = $j('#user-table').DataTable({
        //         responsive: true,
        //         processing: true,
        //         serverSide: true,
        //         autoWidth: false,
        //         ajax: {
        //             url: '<?php echo e(route('dashboard.laporan-perbulan.data')); ?>',
        //             data: function(d) {
        //                 d.pabrik_id = $j('#pabrik_id').val(); // Mengambil id pabrik dari select
        //                 d.tanggal = $j('#exampleInputdate2').val(); // Mengambil tanggal dari input
        //             }
        //         },
        //         columns: [{
        //                 data: 'DT_RowIndex',
        //                 searchable: false,
        //                 sortable: false
        //             },
        //             {
        //                 data: 'surat_jalan'
        //             },
        //             {
        //                 data: 'tgl_sj'
        //             },
        //             {
        //                 data: 'id_pabrik'
        //             },
        //             {
        //                 data: 'id_user'
        //             },
        //         ]
        //     });

        //     // Menangani klik tombol Tampilkan Data
        //     $j('#btnSearch').click(function() {
        //         table.ajax.reload(); // Memuat ulang data tabel dengan parameter baru
        //     });
        // });
        $j(function() {
            var table = $j('#user-table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '<?php echo e(route('dashboard.laporan-perbulan.data')); ?>',
                    data: function(d) {
                        d.date_start = $j('#date_start').val(); // Mengambil tanggal awal dari input
                        d.date_end = $j('#date_end').val(); // Mengambil tanggal akhir dari input
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'surat_jalan'
                    },
                    {
                        data: 'tgl_sj'
                    },
                    {
                        data: 'id_pabrik'
                    },
                    {
                        data: 'id_user'
                    },
                ]
            });

            // Menangani klik tombol Tampilkan Data
            $j('#btnSearch').click(function() {
                table.ajax.reload(); // Memuat ulang data tabel dengan parameter baru
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\inventory\resources\views/pages/dashboard_admin/laporan/laporan_perbulan/index.blade.php ENDPATH**/ ?>