<?php if($message = Session::get('success')): ?>

 <?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        Swal.fire({
            toast: true,
            type: 'success',
            position: "top",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            title: "<span style='color:white'>" + '<?php echo e($message); ?>' + "</span>",
            text: "",
            icon: 'success',
            heightAuto: true,
            background: "green",
            iconColor: "white",
          });
    </script>
<?php $__env->stopPush(); ?>
<?php session()->forget('success') ?>

<?php endif; ?>

<?php if($message = Session::get('error')): ?>
 <?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        Swal.fire({
            toast: true,
            type: 'error',
            position: "top",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            title: "<span style='color:white'>" + '<?php echo e($message); ?>' + "</span>",
            text: "",
            icon: 'error',
            heightAuto: true,
            background: "#DD6B55",
            iconColor: "<span style='color:white'></span>",
          });
    </script>
<?php $__env->stopPush(); ?>
<?php session()->forget('success') ?>
<?php endif; ?>
<?php if($message = Session::get('warning')): ?>
<div class="alert alert-warning alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><?php echo e($message); ?></strong>
</div>
<?php endif; ?>
<?php if($message = Session::get('info')): ?>
<div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><?php echo e($message); ?></strong>
</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\RealEstate\resources\views/flash-message.blade.php ENDPATH**/ ?>