<?php $__env->startSection('title'); ?>
    Surat Jalan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
    <li class="breadcrumb-item">Transaksi</li>
    <li class="breadcrumb-item active">Surat Jalan</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php echo $__env->make('layouts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-end">
                                <a href="<?php echo e(route('dashboard.suratjalan.create')); ?>" class="btn btn-success btn-sm"><i
                                        class="fa fa-plus-circle"></i> Tambah Surat Jalan</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-stiped table-bordered" id="user-table">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Nomor Surat</th>
                                        <th>Tanggal Surat</th>
                                        <th>Pelanggan</th>
                                        <th>Kendaraan</th>
                                        <th>Jenis Batubara</th>
                                        <th>Gudang</th>
                                        <th>Jumlah Ton</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                        <!-- <th width="15%"><i class="fa fa-cog"></i></th> -->
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

        // Menggunakan $j untuk menghindari bentrok
        $j(function() {
            var table = $j('#user-table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '<?php echo e(route('dashboard.suratjalan.data')); ?>',
                },
                columns: [{
                        data: 'DT_RowIndex',
                        searchable: false,
                        sortable: false
                    },
                    {
                        data: 'nomor_surat'
                    },
                    {
                        data: 'tanggal_surat'
                    },
                    {
                        data: 'id_pelanggan'
                    },
                    {
                        data: 'id_kendaraan'
                    },
                    {
                        data: 'id_jenis_batu_bara'
                    },
                    {
                        data: 'id_gudang'
                    },
                    {
                        data: 'jumlah_ton'
                    },
                    {
                        data: 'total_harga'
                    },
                    {
                        data: 'total_harga'
                    },
                    {
                        data: 'status'
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Batubara\resources\views/pages/dashboard_admin/suratjalan/index.blade.php ENDPATH**/ ?>