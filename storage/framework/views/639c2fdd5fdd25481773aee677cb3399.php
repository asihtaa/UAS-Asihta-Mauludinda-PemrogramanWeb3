<?php $__env->startSection('title'); ?>
    Edit Barang
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
    <li class="breadcrumb-item">Master Data Barang</li>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('dashboard.barang.index')); ?>" style="color: black;">Barang</a>
    </li>
    <li class="breadcrumb-item active">Edit Barang</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Barang</h3>
                        </div>
                        <!-- form update -->
                        <form action="<?php echo e(route('dashboard.barang.update', [$barang->id])); ?>" method="POST"
                            enctype="multipart/form-data" id="editForm">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang <span class="text-danger">*</span></label>
                                    <input type="nama_barang" name="nama_barang" class="form-control" id="nama_barang"
                                        placeholder="Enter Nama Barang" value="<?php echo e($barang->nama_barang); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="kode_barang">Kode Barang <span class="text-danger">*</span></label>
                                    <input type="kode_barang" name="kode_barang" class="form-control" id="kode_barang"
                                        placeholder="Enter Kode Barang" value="<?php echo e($barang->kode_barang); ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="kode_kategori">Kategori <span class="text-danger">*</span></label>
                                    <select class="form-control" name="kode_kategori" id="kode_kategori" required>
                                        <option disabled selected>Select Kategori</option>
                                        <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt_kategori): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($dt_kategori->kode_kategori); ?>"
                                                <?php echo e($barang->kode_kategori == $dt_kategori->kode_kategori ? 'selected' : ''); ?>>
                                                <?php echo e($dt_kategori->nama_kategori); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="foto_barang">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="foto_barang"
                                                name="foto_barang" accept="image/*">
                                            <label class="custom-file-label" for="foto_barang">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                                <a href="<?php echo e(route('dashboard.barang.index')); ?>" class="btn btn-danger">Kembali</a>
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

    <!-- bs-custom-file-input -->
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\inventory\resources\views/pages/dashboard_admin/master_data_barang/barang/edit.blade.php ENDPATH**/ ?>