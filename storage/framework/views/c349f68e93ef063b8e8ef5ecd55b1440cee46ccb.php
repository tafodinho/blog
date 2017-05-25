<?php $__env->startSection('title'); ?>
    Login
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('include.login-message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="col-md-4 col-md-offset-4 login">
    <h4 style="font-weight: bold">Login</h4>
    <hr>
    <form class="" action="<?php echo e(route('signin')); ?>" method="post">
        <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?> form-group-lg" >

            <input class="form-control" type="email" name="email" value="" id="email" placeholder="email">
        </div>
        <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?> form-group-lg">

            <input class="form-control" type="password" name="password" value="" id="password" placeholder="password">
        </div>
        <div class="form-group">
            <label>
                <input type="checkbox" name="remember-me" value="remember me"> Remember me
            </label>
        </div>
        <div class="form-group form-group-lg">
            <button type="submit" class="btn btn-primary btn-block btn-lg" name="button">LogIn</button>
        </div>

        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
    </form>
</div>
<?php echo $__env->make('include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>