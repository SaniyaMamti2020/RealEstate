<?php $__env->startSection('title'); ?>
    <?php echo e(__('user.user')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h5><b><?php echo e(__('user.user')); ?></b></h5>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-end mb-4" href="<?php echo e(route('user.create')); ?>"><?php echo e(__('common.add')); ?></a>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table class="display" id="dataTableBuilder">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="col-sm-12 datatable-form-filter no-padding">
                                            <?php echo Form::text('filter_username', Request::get('filter_username', null), ['class' => 'form-control']); ?>

                                        </div>
                                    </th>
                                    <th>
                                        <div class="col-sm-12 datatable-form-filter no-padding">
                                            <?php echo Form::text('filter_email', Request::get('filter_email', null), ['class' => 'form-control']); ?>

                                        </div>
                                    </th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('user.username')); ?></th>
                                    <th><?php echo e(__('user.email')); ?></th>
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
            var username = "<?php echo e(__('user.username')); ?>";
            var email = "<?php echo e(__('user.email')); ?>";
            var status = "<?php echo e(__('common.status')); ?>";
            var action = "<?php echo e(__('common.action')); ?>";

            (function(window, $) {
                window.LaravelDataTables = window.LaravelDataTables || {};
                window.LaravelDataTables["dataTableBuilder"] = $("#dataTableBuilder").DataTable({
                    "serverSide": true,
                    "processing": true,
                    "ajax": {
                        data: function(d) {
                            d.lang = jQuery(".datatable-form-filter select[name='filter_lang']").val();
                            d.username = jQuery(".datatable-form-filter input[name='filter_username']").val();
                            d.email = jQuery(".datatable-form-filter input[name='filter_email']").val();
                        }
                    },
                    "columns": [{
                            "name": "username",
                            "data": "username",
                            "title": username,
                            "orderable": false,
                            "searchable": false
                        },
                        {
                            "name": "email",
                            "data": "email",
                            "title": email,
                            "orderable": false,
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
                        }
                    ],
                    "searching": false,
                    "oLanguage": {
                        "sLengthMenu": "Display &nbsp;_MENU_",
                    },
                    "stateSave": true,
                    responsive: true,
                    colReorder: true,
                    /* scrollY: '50vh',
                     scrollX: true,*/
                    "buttons": [],
                    "order": [
                        [0, "asc"]
                    ],
                    "pageLength": 10,
                });
            })(window, jQuery);
        </script>
        <?php echo $__env->make('admin.user.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.comman.datatable_filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.comman.commonscript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopPush(); ?>
    <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RealEstate\resources\views/admin/user/index.blade.php ENDPATH**/ ?>