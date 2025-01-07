<?php $__env->startSection('title'); ?>
    Tambah Data Gudang
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
    <li class="breadcrumb-item">Master Data</li>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('dashboard.gudang.index')); ?>" style="color: black;">Data Gudang</a>
    </li>
    <li class="breadcrumb-item active">Tambah Data Gudang</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Data Gudang</h3>
                        </div>
                        <!-- form store -->
                        <form action="<?php echo e(route('dashboard.gudang.store')); ?>" method="POST" enctype="multipart/form-data"
                            id="userForm">
                            <?php echo csrf_field(); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Gudang<span class="text-danger">*</span></label>
                                    <input type="nama" name="nama" class="form-control" id="nama"
                                        placeholder="Enter Nama gudang" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="lokasi">Lokasi<span class="text-danger">*</span></label>
                                    <input type="lokasi" name="lokasi" class="form-control" id="lokasi"
                                        placeholder="Enter Lokasi" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="pengawas">Pengawas<span class="text-danger">*</span></label>
                                    <input type="pengawas" name="pengawas" class="form-control" id="pengawas"
                                        placeholder="Enter Pengawas" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="telepon">Telepon<span class="text-danger">*</span></label>
                                    <input type="telepon" name="telepon" class="form-control" id="telepon"
                                        placeholder="Enter Telepon" required>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                                <a href="<?php echo e(route('dashboard.gudang.index')); ?>" class="btn btn-danger">Kembali</a>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Batubara\resources\views/pages/dashboard_admin/gudang/create.blade.php ENDPATH**/ ?>