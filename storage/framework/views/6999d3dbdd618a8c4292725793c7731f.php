<?php $__env->startSection('title'); ?>
    Edit Kategori
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
    <li class="breadcrumb-item">Master Data Barang</li>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('dashboard.kategori.index')); ?>" style="color: black;">Kategori</a>
    </li>
    <li class="breadcrumb-item active">Edit Kategori</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Kategori</h3>
                        </div>
                        <!-- form update -->
                        <form action="<?php echo e(route('dashboard.kategori.update', [$kategori->id])); ?>" method="POST"
                            enctype="multipart/form-data" id="editForm">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_kategori">Nama Kategori<span class="text-danger">*</span></label>
                                    <input type="nama_kategori" name="nama_kategori" class="form-control" id="nama_kategori"
                                        placeholder="Enter Nama Katagori" value="<?php echo e($kategori->nama_kategori); ?>" required>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                                <a href="<?php echo e(route('dashboard.kategori.index')); ?>" class="btn btn-danger">Kembali</a>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\inventory\resources\views/pages/dashboard_admin/master_data_barang/kategori/edit.blade.php ENDPATH**/ ?>