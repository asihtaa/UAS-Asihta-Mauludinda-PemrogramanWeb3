<?php $__env->startSection('title'); ?>
    Edit Kendaraan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('dashboard.kendaraan.index')); ?>" style="color: black;">Kendaraan</a>
    </li>
    <li class="breadcrumb-item active">Edit Kendaraan</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Kendaraan</h3>
                        </div>
                        <!-- form update -->
                        <form action="<?php echo e(route('dashboard.kendaraan.update', [$kendaraan->id])); ?>" method="POST"
                            enctype="multipart/form-data" id="editForm">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="card-body">
                                <div class="form-group">
                                <label for="nomor_polisi">Nomor Polisi<span class="text-danger">*</span></label>
                                    <input type="nomor_polisi" name="nomor_polisi" class="form-control" id="nomor_polisi"
                                        placeholder="Enter Nomor Polisi" value="<?php echo e($kendaraan->nomor_polisi); ?>" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="jenis_kendaraan">Jenis Kendaraan<span class="text-danger">*</span></label>
                                    <input type="jenis_kendaraan" name="jenis_kendaraan" class="form-control" id="jenis_kendaraan"
                                        placeholder="Enter Jenis Kendaraan" value="<?php echo e($kendaraan->jenis_kendaraan); ?>" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_supir">Nama Supir<span class="text-danger">*</span></label>
                                    <input type="nama_supir" name="nama_supir" class="form-control" id="nama_supir"
                                        placeholder="Nama Supir" value="<?php echo e($kendaraan->nama_supir); ?>" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="telepon_supir">Telepon Supir<span class="text-danger">*</span></label>
                                    <input type="telepon_supir" name="telepon_supir" class="form-control" id="telepon_supir"
                                        placeholder="Telepon Supir" value="<?php echo e($kendaraan->telepon_supir); ?>" required>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                                <a href="<?php echo e(route('dashboard.kendaraan.index')); ?>" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Batubara\resources\views/pages/dashboard_admin/data_kendaraan/edit.blade.php ENDPATH**/ ?>