<?php $__env->startSection('title'); ?>
    Log In
<?php $__env->stopSection(); ?>

<?php $__env->startSection('auth-content'); ?>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>Log In</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />

                    <div class="input-group mb-3">
                        <input id="email" type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control"
                            placeholder="email" required autofocus autocomplete="username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input id="password" type="password" name="password" class="form-control" placeholder="Password"
                            required autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember_me" name="remember">
                                <label for="remember_me">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="text-center mt-4">
                    <p class="mb-1">
                        <a href="<?php echo e(route('password.request')); ?>">I forgot my password</a>
                    </p>
                    <p class="mb-0">
                        <a href="<?php echo e(route('register')); ?>" class="text-center">Register a new membership</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\inventory\resources\views/auth/login.blade.php ENDPATH**/ ?>