<?php $__env->startSection('title'); ?>
    welcome!
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <?php echo $__env->make('include.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <div class="row" style="margin-top: 20px">
      <div class="col-sm-6">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="<?php echo e(asset('/images/tafang.jpg')); ?>" alt="Chania">
            </div>

            <div class="item">
              <img src="<?php echo e(asset('/images/tafang.jpg')); ?>" alt="Chania">
            </div>

            <div class="item">
              <img src="<?php echo e(asset('/images/tafang.jpg')); ?>" alt="Flower">
            </div>

            <div class="item">
              <img src="<?php echo e(asset('/images/tafang.jpg')); ?>" alt="Flower">
            </div>
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
          </div>
      </div>
      <div class="col-md-5 col-md-offset-1">
        <h4 style="font-weight: bold">SignUp</h4>
        <hr>
          <form class="" action="<?php echo e(route('signup')); ?>" method="post">
              <div class="form-group form-group-lg">
                  <input class="form-control" type="email" name="email" value="" id="email" placeholder="Email">
              </div>
              <div class="form-group form-group-lg">
                  <label for="first_name"></label>
                  <input class="form-control" type="text" name="first_name" value="" id="first_name" placeholder="Full name">
              </div>
              <div class="form-group form-group-lg">
                  <label for="password"></label>
                  <input class="form-control" type="password" name="password" value="" id="password" placeholder="Password">
              </div>
              <div class="form-group form-group-lg">
                  <label for="c-password_confirmation"></label>
                  <input class="form-control" type="password" name="password_confirmation" value="" id="password_confirmation" placeholder="Confirm password">
              </div>
              <button type="sumbit" class="btn btn-primary btn-block btn-lg" name="button">Register</button>
              <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
          </form>
      </div>
  </div>
</div>
<?php echo $__env->make('include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>