<?php if(session('success')): ?>
    <div class="alert alert-success" role="alert" id="successAlert" style="max-width: 300px; margin-left: auto;">
        <div style="text-align: lift;">
            <?php echo e(session('success')); ?>

        </div>
    </div>
<?php endif; ?>

<?php if($errors->any()): ?>
    <div class="alert alert-danger" role="alert" id="errorAlert" style="max-width: 300px; margin-left: auto;">
        <div style="text-align: lift;">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($error); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>

<script>
    // Cari elemen alert
    const successAlert = document.getElementById('successAlert');
    const errorAlert = document.getElementById('errorAlert');

    // Periksa jika alert ada
    if (successAlert) {
        // Hilangkan alert setelah 3 detik
        setTimeout(function() {
            successAlert.remove();
        }, 3000);
    }

    if (errorAlert) {
        // Hilangkan alert setelah 3 detik
        setTimeout(function() {
            errorAlert.remove();
        }, 3000);
    }
</script>
<?php /**PATH C:\laragon\www\Batubara\resources\views/layouts/alert.blade.php ENDPATH**/ ?>