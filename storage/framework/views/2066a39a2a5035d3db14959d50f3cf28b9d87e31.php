<?php if(Session::has('message')): ?>
        <div class="col-md-4 col-md-offset-4">
          <div class="alert alert-success" role="alert">
            <?php echo e(Session::get('message')); ?>

          </div>
        </div>
<?php endif; ?>
