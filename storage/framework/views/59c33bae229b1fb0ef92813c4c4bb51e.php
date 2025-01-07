<?php $__env->startSection('title'); ?>
    Resgister
<?php $__env->stopSection(); ?>

<?php $__env->startSection('auth-content'); ?>
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Resgister</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form method="POST" action="<?php echo e(route('register')); ?>">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

                    <div class="input-group mb-3">
                        <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>"
                            placeholder="name" required autocomplete="name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>"
                            placeholder="Email" required autocomplete="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password"
                            required autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control"
                            placeholder="Retype password" required autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>

                <div class="text-center mt-4">
                    <a href="<?php echo e(route('login')); ?>" class="text-center">I already have a membership</a>
                </div>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Batubara\resources\views/auth/register.blade.php ENDPATH**/ ?>