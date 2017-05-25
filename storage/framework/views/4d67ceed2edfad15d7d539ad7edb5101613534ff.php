<?php if(count($errors) > 0): ?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div class="alert alert-danger" role="alert">
                      <?php echo e($error); ?>

                    <div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
<?php if(Session::has('message')): ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="alert alert-success" role="alert">
            <?php echo e(Session::get('message')); ?>

          </div>
        </div>
    </div>
<?php endif; ?>
