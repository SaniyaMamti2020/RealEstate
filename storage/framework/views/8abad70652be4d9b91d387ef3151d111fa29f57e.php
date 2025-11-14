<?php $__env->startSection('title'); ?>
    <?php echo e(__('role.role')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h5><b><?php echo e(__('role.role')); ?></b></h5>
            </div>
            <div class="col-sm-6">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role-create')): ?>
                    <a class="btn btn-primary float-end mb-4" href="<?php echo e(route('roles.create')); ?>"><?php echo e(__('common.add')); ?></a>
                <?php endif; ?>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table class="display" id="dataTableBuilder">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('role.role_name')); ?></th>
                                    <th><?php echo e(__('common.action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
        <script type="text/javascript">
            var name = "<?php echo e(__('role.role_name')); ?>";
            var action = "<?php echo e(__('common.action')); ?>";

            (function(window, $) {
                window.LaravelDataTables = window.LaravelDataTables || {};
                window.LaravelDataTables["dataTableBuilder"] = $("#dataTableBuilder").DataTable({
                    "serverSide": true,
                    "processing": true,
                    "ajax": {
                        data: function(d) {}
                    },
                    "columns": [{
                            "name": "name",
                            "data": "name",
                            "title": name,
                            "orderable": false,
                            "searchable": false
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
                    scrollY: '50vh',
                    scrollX: true,
                    "buttons": [],
                    //"order": [[ 0, "asc" ]],
                    "pageLength": 10,
                });
            })(window, jQuery);
        </script>
        <?php echo $__env->make('admin.roles.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.comman.commonscript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.comman.datatable_filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopPush(); ?>
    <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RealEstate\resources\views/admin/roles/index.blade.php ENDPATH**/ ?>