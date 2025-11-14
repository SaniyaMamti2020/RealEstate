<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startPush('breadcrumb'); ?>
    <li class="breadcrumb-item">Pages</li>
    <li class="breadcrumb-item active">Sample Page</li>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('css'); ?>
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/animate.css')); ?>">
          <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/chartist.css')); ?>">
          <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/date-picker.css')); ?>">
          <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/prism.css')); ?>">
          <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vector-map.css')); ?>"> -->
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->yieldContent('breadcrumb-list'); ?>
    <!-- Container-fluid starts-->
    <div class="container-fluid dashboard-default-sec">
        <div class="row">

        </div>
    </div>
    <!-- Container-fluid Ends-->
    <?php $__env->startPush('scripts'); ?>
        <!-- <script src="<?php echo e(asset('assets/js/chart/chartist/chartist.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/chart/chartist/chartist-plugin-tooltip.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/chart/knob/knob.min.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/chart/knob/knob-chart.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/chart/apex-chart/apex-chart.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/chart/apex-chart/stock-prices.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/prism/prism.min.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/clipboard/clipboard.min.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/counter/jquery.waypoints.min.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/counter/jquery.counterup.min.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/counter/counter-custom.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/custom-card/custom-card.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/vector-map/jquery-jvectormap-2.0.2.min.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/vector-map/map/jquery-jvectormap-au-mill.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/vector-map/map/jquery-jvectormap-in-mill.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/vector-map/map/jquery-jvectormap-asia-mill.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/dashboard/default.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.en.js')); ?>"></script>
                      <script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.custom.js')); ?>"></script> -->
    <?php $__env->stopPush(); ?>
    <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RealEstate\resources\views/admin/dashboard/default.blade.php ENDPATH**/ ?>