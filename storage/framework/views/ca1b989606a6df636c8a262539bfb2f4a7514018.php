

<?php $__env->startSection('title'); ?>
<?php echo e(__('Clear Cache')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
   
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6">
      <h5><b><?php echo e(__('Clear Cache')); ?></b></h5>
    </div>
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="p-2 row" style="background:#f5f7fb">
              <div class="col-md-12 mt-3">
                <h6>Complied views will be cleared</h6>
                <hr>
                <h6>Application cache will be cleared</h6>
                <hr>
                <h6>Route cache will be cleared</h6>
                <hr>
                <h6>Configuration cache will be cleared</h6>
                <hr>
                <h6>Complied services and packages files will be removed</h6>
                <hr>
                <h6>Caches will be cleared</h6>
                <a href="<?php echo e(route('clear-post')); ?>" class="btn btn-primary mt-3">Click to clear</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\airbnb service\resources\views/admin/clear-cache.blade.php ENDPATH**/ ?>