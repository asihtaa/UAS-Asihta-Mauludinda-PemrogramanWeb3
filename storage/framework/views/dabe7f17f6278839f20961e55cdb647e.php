<?php $__env->startSection('title'); ?>
    List Barang
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
    <li class="breadcrumb-item">Laporan</li>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('dashboard.laporan-perhari.index')); ?>" style="color: black;">Laporan Perhari</a>
    </li>
    <li class="breadcrumb-item active">List Barang</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php echo $__env->make('layouts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">List Barang - <?php echo e($surat_jalan->surat_jalan); ?></h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-stiped table-bordered" id="user-table">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Foto Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Kode barang</th>
                                        <th>Kode Kategori</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        
                        <div class="card-footer text-center">
                            <a href="<?php echo e(route('dashboard.laporan-perhari.index')); ?>" class="btn btn-danger">Kembali</a>
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

        // Menggunakan $j untuk menghindari bentrok
        // $j(function() {
        //     var table = $j('#user-table').DataTable({
        //         responsive: true,
        //         processing: true,
        //         serverSide: true,
        //         autoWidth: false,
        //         ajax: {
        //             url: '<?php echo e(route('dashboard.list-barang.dataListBarang')); ?>',
        //         },
        //         columns: [{
        //                 data: 'DT_RowIndex',
        //                 searchable: false,
        //                 sortable: false
        //             },
        //             {
        //                 data: 'foto_barang'
        //             },
        //             {
        //                 data: 'nama_barang'
        //             },
        //             {
        //                 data: 'kode_barang'
        //             },
        //             {
        //                 data: 'kode_kategori'
        //             },
        //         ]
        //     });
        // });
        $j(function() {
            var id_sj = "<?php echo e($id); ?>"; // Ambil id_sj dari PHP dan sisipkan ke JavaScript
            var table = $j('#user-table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '<?php echo e(route('dashboard.list-barang.dataListBarang')); ?>',
                    data: {
                        id_sj: id_sj // Kirim id_sj ke server
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'foto_barang'
                    },
                    {
                        data: 'nama_barang'
                    },
                    {
                        data: 'kode_barang'
                    },
                    {
                        data: 'kode_kategori'
                    },
                ]
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\inventory\resources\views/pages/dashboard_admin/laporan/laporan_perhari/detail_surat.blade.php ENDPATH**/ ?>