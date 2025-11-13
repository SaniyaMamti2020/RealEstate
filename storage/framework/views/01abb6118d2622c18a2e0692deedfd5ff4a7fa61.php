<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p class="mb-1"><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
<?php endif; ?><?php /**PATH E:\xampp\htdocs\airbnb service\resources\views/components/error.blade.php ENDPATH**/ ?>