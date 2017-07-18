<?php $__env->startSection('content'); ?>

        <div class="blog-post">
            <h2 class="blog-post-title"><?php echo e($post->title); ?></h2>
            <p class="blog-post-meta"><?php echo e($post->created_at); ?> by <?php echo e($post->user->name); ?></p>

            <p><?php echo e($post->text); ?></p>
        </div><!-- /.blog-post -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.blog', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>