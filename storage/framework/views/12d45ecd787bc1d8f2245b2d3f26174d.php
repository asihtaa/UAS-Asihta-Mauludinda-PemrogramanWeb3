<?php $__env->startSection('title'); ?>
    Tambah Surat Jalan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('breadcrumb'); ?>
    <li class="breadcrumb-item">Master Data</li>
    <li class="breadcrumb-item">
        <a href="<?php echo e(route('dashboard.pelanggan.index')); ?>" style="color: black;">Surat Jalan</a>
    </li>
    <li class="breadcrumb-item active">Tambah Surat Jalan</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layouts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Surat Jalan</h3>
                        </div>
                        <!-- form store -->
                        <form action="<?php echo e(route('dashboard.suratjalan.store')); ?>" method="POST" enctype="multipart/form-data"
                            id="userForm">
                            <?php echo csrf_field(); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nomor_surat">Nomor Surat<span class="text-danger">*</span></label>
                                    <input type="nomor_surat" name="nomor_surat" class="form-control" id="nomor_surat"
                                        placeholder="Enter Nomor Surat" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tanggal_surat">Tanggal Surat<span class="text-danger">*</span></label>
                                    <input type="date" name="tanggal_surat" class="form-control" id="alatanggal_suratmat"
                                         required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                <label>Select Kendaraan</label>
                                <select name="id_kendaraan" id="id_kendaraan" class="form-control" required>
                                    <option value="">Select Kendaraan</option>
                                    <?php $__currentLoopData = $kendaraan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kendaraan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($kendaraan->id); ?>"><?php echo e($kendaraan->jenis_kendaraan); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                <label>SelecPiliht Pelanggan</label>
                                <select name="id_pelanggan" id="id_pelanggan" class="form-control" required>
                                    <option value="">Select Pelanggan</option>
                                    <?php $__currentLoopData = $pelanggan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pelanggan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($pelanggan->id); ?>"><?php echo e($pelanggan->nama); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                <label>Pilih Kalori</label>
                                <select name="id_jenis_batu_bara" id="id_jenis_batu_bara" class="form-control" required>
                                    <option value="">Select Batubara</option>
                                <?php $__currentLoopData = $batubara; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $batubara): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($batubara->id); ?>" 
                                    data-price="<?php echo e($batubara->harga_per_ton); ?>"
                                    <?php echo e(old('id_jenis_batu_bara') == $batubara->id ? 'selected' : ''); ?>>
                                    <?php echo e($batubara->kalori); ?> ( Rp.  <?php echo e(number_format($batubara->harga_per_ton, 2)); ?>/ton )
                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                <label>Pilih Lokasi Gudang</label>
                                <select name="id_gudang" id="id_gudang" class="form-control" required>
                                    <option value="">Pilih Gudang</option>
                                    <?php $__currentLoopData = $gudang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gudang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($gudang->id); ?>"><?php echo e($gudang->lokasi); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="jumlah_ton">Jumlah Ton<span class="text-danger">*</span></label>
                                    <input type="jumlah_ton" name="jumlah_ton" class="form-control" id="jumlah_ton"
                                        placeholder="Enter Jumlah Ton" required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="total_harga">Total Harga<span class="text-danger">*</span></label>
                                    <input type="total_harga" name="total_harga" class="form-control" id="total_harga"
                                        placeholder="Enter Total Harga" required>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                                <a href="<?php echo e(route('dashboard.suratjalan.index')); ?>" class="btn btn-danger">Kembali</a>
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
    <script>
        // Calculate total amount automatically
        document.getElementById('id_jenis_batu_bara').addEventListener('change', calculateTotal);
        document.getElementById('jumlah_ton').addEventListener('input', calculateTotal);

        function calculateTotal() {
            const jumlah_ton = document.getElementById('jumlah_ton').value;
            const selectedOption = document.getElementById('id_jenis_batu_bara').selectedOptions[0];
            const pricePerTon = selectedOption.dataset.price;
            
            if (jumlah_ton && pricePerTon) {
                const total = jumlah_ton * pricePerTon;
                document.getElementById('total_harga').value = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(total);
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Batubara\resources\views/pages/dashboard_admin/suratjalan/create.blade.php ENDPATH**/ ?>