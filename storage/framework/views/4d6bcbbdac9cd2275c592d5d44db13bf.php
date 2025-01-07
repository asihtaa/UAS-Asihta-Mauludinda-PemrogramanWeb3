<?php $__env->startSection('title'); ?>
    Tambah Kendaraan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('dashboard.kendaraan.index')); ?>" style="color: black;">Kendaraan</a>
    </li>
    <li class="breadcrumb-item active">Tambah Kendaraan</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Kendaraan</h3>
                        </div>
                        <!-- form store -->
                        <form action="<?php echo e(route('dashboard.kendaraan.store')); ?>" method="POST" enctype="multipart/form-data"
                            id="userForm">
                            <?php echo csrf_field(); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nomor_polisi">Nama kendaraan<span class="text-danger">*</span></label>
                                    <input type="nomor_polisi" name="nomor_polisi" class="form-control" id="nomor_polisi"
                                        placeholder="Enter Nomor Polisi" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="jenis_kendaraan">Nama kendaraan<span class="text-danger">*</span></label>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Batubara\resources\views/pages/dashboard_admin/data_kendaraan/create.blade.php ENDPATH**/ ?>