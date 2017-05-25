<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
        <title><?php echo $__env->yieldContent('title'); ?></title>

    </head>
    <body>
      <?php echo $__env->make('include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="container">
            <?php echo $__env->yieldContent('content'); ?>
        </div>

    <script type="text/javascript" src="<?php echo e(asset('js/jquery.min.js ')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::to('js/app.js')); ?>">

    </script>
    </body>
</html>
