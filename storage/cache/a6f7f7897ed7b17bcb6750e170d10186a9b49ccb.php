<?php $__env->startSection('content'); ?>

    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="blog-post">
            <h2 class="blog-post-title">
                <a href="<?php echo e(url('default/show/' . $post->id)); ?>"><?php echo e($post->title); ?></a></h2>
            <p class="blog-post-meta"><?php echo e($post->created_at); ?> by <?php echo e($post->user->name); ?></p>

            <p><?php echo e($post->text); ?></p>
        </div><!-- /.blog-post -->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.blog', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>