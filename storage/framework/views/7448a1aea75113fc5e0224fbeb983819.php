<?php $__env->startSection('title'); ?>
    Edit Pelanggan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
    <li class="breadcrumb-item">Master Data</li>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('dashboard.pelanggan.index')); ?>" style="color: black;">Pelanggan</a>
    </li>
    <li class="breadcrumb-item active">Edit Pelanggan</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit pelangPelanggangan</h3>
                        </div>
                        <!-- form update -->
                        <form action="<?php echo e(route('dashboard.pelanggan.update', [$pelanggan->id])); ?>" method="POST"
                            enctype="multipart/form-data" id="editForm">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama Pelanggan<span class="text-danger">*</span></label>
                                    <input type="nama" name="nama" class="form-control" id="nama"
                                         value="<?php echo e($pelanggan->nama); ?>" required>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="alamat">Alamat<span class="text-danger">*</span></label>
                                    <input type="alamat" name="alamat" class="form-control" id="alamat"
                                         value="<?php echo e($pelanggan->alamat); ?>"required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="telepon">No. Telepon <span class="text-danger">*</span></label>
                                    <input type="telepon" name="telepon" class="form-control" id="telepon"
                                         value="<?php echo e($pelanggan->telepon); ?>"required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="email">Email<span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" id="email"
                                         value="<?php echo e($pelanggan->email); ?>" required>
                                </div>
                            </div>

                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                                <a href="<?php echo e(route('dashboard.pelanggan.index')); ?>" class="btn btn-danger">Kembali</a>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Batubara\resources\views/pages/dashboard_admin/pelanggan/edit.blade.php ENDPATH**/ ?>