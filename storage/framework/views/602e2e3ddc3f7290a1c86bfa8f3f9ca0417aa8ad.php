<?php $__env->startSection('title'); ?>
    Account
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section>
        <div class="row new-post">
          <div class="col-md-6 col-md-offset-3">
            <header></header>
            <form class="" action="<?php echo e(route('account.save')); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="first_name">first_name</label>
                    <input type="input" name="first_name" class="form-control" value="<?php echo e($user->first_name); ?>">
                </div>
                <div class="form-group">
                    <label for="image">Image (only .jgp)</label>
                    <input type="file" name="image" class="" id="image" value="">
                </div>
                <button type="submit" class="btn btn-primary" name="button">Save Account</button>
                <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
            </form>
          </div>
        </div>
        <?php if(Storage::disk('local')->has($user->first_name.'-'.$user->id.'.jpg')): ?>
            <section class="row new-post">
                <div class="col-md-6 col-md-offset-3">
                    <img src="<?php echo e(route('accountimage', ['filename' => $user->first_name . '-' . $user->id . '.jpg' ])); ?>" alt="" class="img-responsive" />
                </div>
            </section>
        <?php endif; ?>
      </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>