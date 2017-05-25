<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo e(route('dashboard')); ?>"><span style="color:white;font-weight:bold;font-size:25px">Live</span><span style="color:grey"> Forum</span></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <?php if(Auth::user()): ?>
            <li ><a href="<?php echo e(route('account')); ?>" ><span style="color:white;font-weight:bold">Account</span></a></li>
            <li ><a href="<?php echo e(route('logout')); ?>"><span style="color:white;font-weight:bold">Logout</span></a></li>
          <?php else: ?>
            <li style="color:white"><a href="<?php echo e(route('login')); ?>"><span class="header-top"   style="color:white;font-weight:bold">Login</span></a></li>
            <li style="color:white"><a href="<?php echo e(route('home')); ?>"><span class="header-top"  style="color:white;font-weight:bold">Signup</span></a></li>
          <?php endif; ?>
        </ul>

      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</header
