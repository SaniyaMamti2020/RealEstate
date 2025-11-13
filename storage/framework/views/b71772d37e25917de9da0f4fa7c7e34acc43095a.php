<?php $__env->startSection('title'); ?>
<?php echo e(__('testimonial.testimonial_list')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
<style type="text/css">
  .dropdown-basic .dropdown .dropbtn {
  color: #fff;
  padding: 5px 10px!important;
  border: none;
  cursor: pointer;
}
.dataTables_wrapper button {
  background-color: #fff !important;
}
.dataTables_filter {
  display: none;
}
.select2-selection__rendered{
  display: none;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
   
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6">
      <h5><b><?php echo e(__('testimonial.testimonial_list')); ?></b></h5>
    </div>
    <div class="col-sm-6">
      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('testimonial-create')): ?>
      <a class="btn btn-primary float-end mb-4" href="<?php echo e(route('testimonial.create')); ?>"><?php echo e(__('common.add')); ?></a>
      <?php endif; ?>
      
    </div>
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
            <table id="dataTableBuilder">
              <thead>
                <tr>
                  <th>
                    <div class="col-sm-8 datatable-form-filter no-padding">
                        <?php echo Form::text('filter_title', Request::get('filter_title',null), array('class' => 'form-control')); ?>

                    </div>
                  </th>
                  <th></th>
                  <th></th>
                </tr>
                <tr>
                  <th><?php echo e(__('testimonial.title')); ?></th>
                  <th><?php echo e(__('common.status')); ?></th>
                  <th><?php echo e(__('common.action')); ?></th>
                </tr>          
              </thead>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
  var title="<?php echo e(__('testimonial.title')); ?>";
  var status="<?php echo e(__('common.status')); ?>";
  var action="<?php echo e(__('common.action')); ?>";

    (function (window, $) {
        window.LaravelDataTables = window.LaravelDataTables || {};
        window.LaravelDataTables["dataTableBuilder"] = $("#dataTableBuilder").DataTable({
            "serverSide": true,
            "testimonialing": true,
            "ajax": {
                data: function (d) {
                    d.lang = jQuery(".datatable-form-filter select[name='filter_lang']").val();
                    d.title = jQuery(".datatable-form-filter input[name='filter_title']").val();
                }
            },
            "columns": [
              {
                "name": "title",
                "data": "title",
                "title": title,
                "orderable": true,
                "searchable": false 
              },
              {
                "name": "status",
                "data": "status",
                "title": status,
                "render": null,
                "orderable": false,
                "searchable": false,
              },
              {
                "name": "action",
                "data": "action",
                "title": action,
                "render": null,
                "orderable": false,
                "searchable": false,
              }],
            "searching": false,
            "oLanguage": {
              "sLengthMenu": "Display &nbsp;_MENU_",
            },
            "stateSave": true,
            responsive: true,
            colReorder: true,
            /*scrollY: '50vh',
            scrollX: true,*/
            "buttons": [],
            "order": [[ 0, "asc" ]],
            "pageLength":10,
        });
    })(window, jQuery);

    
</script>

<?php echo $__env->make('admin.comman.datatable_filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
<?php echo $__env->make('admin.comman.commonscript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\airbnb service\resources\views/admin/testimonial/index.blade.php ENDPATH**/ ?>