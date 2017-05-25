<?php $__env->startSection('title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
  <?php echo $__env->make('include.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <section class="row new-post">
      <div class="col-md-6 col-md-offset-3">
          <header><h3>What do you have to say?</h3></header>
          <form action="<?php echo e(route('postcreate')); ?>" role="form" method="post">
              <div class="form-group">
                  <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="your post"></textarea>
              </div>
              <button type="submit" class="btn btn-primary" name="button">Submit</button>
              <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
          </form>
      </div>
  </section>
  <section class="row posts">
      <div class="col-md-6 col-md-offset-3">
          <header><h3>News Feed....</h3></header>
          <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
          <?php $count = 0 ?>
            <?php $__currentLoopData = $likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php if($like->post_id == $post->id): ?>
                    <?php $count += 1; ?>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
              <article class="post" data-postid="<?php echo e($post->id); ?>">
                <div class="pic row">
                  <div class="col-sm-2">
                    <img src="<?php echo e(route('accountimage', ['filename' => $post->user->first_name . '-' . $post->user->id . '.jpg' ])); ?>" alt="" class="img-responsive" />
                  </div>
                  <div class="col-sm-6">
                      <div class="row">
                          <span style="font-weight: bold"><?php echo e(ucwords($post->user->first_name)); ?></span>
                      </div>
                      <div class="row">
                          <span style="font-size: 0.8em"><?php echo e($post->created_at); ?></span>
                      </div>
                  </div>
                </div>
                  <p>
                      <?php echo e($post->body); ?>

                  </p>
                  <?php if(Auth::user() == $post->user): ?>
                      <input type="hidden" id="test" value="<?php echo e($post->user->id); ?>">
                  <?php endif; ?>
                  <div class="interaction">
                      <a href="#" class="like like-like"><?php echo e(Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'Liked' : 'Like' : 'Like'); ?></a> |
                      <a href="#" class="like like-unlike"><?php echo e(Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0? 'Disliked' : 'Dislike' : 'Dislike'); ?></a>
                      <?php if(Auth::user() == $post->user): ?>
                      |
                        <a href="#" class="edit">Edit</a> |
                        <a href="<?php echo e(route('post.delete', ['post_id' => $post->id])); ?>">Delete</a>
                      <?php endif; ?>
                      <span class="badge" id="like-count"><?php echo e($count); ?></span>
                  </div>
              </article>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </div>
  </section>
</div>

<!--  modal -->
<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Post</h4>
      </div>
      <div class="modal-body">
          <form>
              <div class="form-group">
                  <label for="post-body">Edit the post</label>
                  <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
              </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    var token = '<?php echo e(Session::token()); ?>';
    var urlEdit = '<?php echo e(route('edit')); ?>';
    var urlLike = '<?php echo e(route('like')); ?>';
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>