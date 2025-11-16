<?php $__env->startSection('title'); ?>
    <?php echo e(__('pages.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h5><b><?php echo e(__('pages.title')); ?></b></h5>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-end mb-4" href="<?php echo e(route('pages.create')); ?>"><?php echo e(__('common.add')); ?></a>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table id="dataTableBuilder">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="col-sm-12 datatable-form-filter no-padding">
                                            <?php echo Form::text('filter_page_name', Request::get('filter_page_name', null), ['class' => 'form-control']); ?>

                                        </div>
                                    </th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('pages.page_name')); ?></th>
                                    <th><?php echo e(__('pages.page_img')); ?></th>
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
            var page_name = "<?php echo e(__('pages.page_name')); ?>";
            var page_img = "<?php echo e(__('pages.page_img')); ?>";
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
                            d.page_name = jQuery(".datatable-form-filter input[name='filter_page_name']").val();
                        }
                    },
                    "columns": [{
                            "name": "page_name",
                            "data": "page_name",
                            "title": page_name,
                            "orderable": true,
                            "searchable": false
                        },
                        {
                            "name": "page_img",
                            "data": "page_img",
                            "title": page_img,
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
                        }
                    ],
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
                    "order": [
                        [0, "asc"]
                    ],
                    "pageLength": 10,
                });
            })(window, jQuery);
        </script>

        <?php echo $__env->make('admin.comman.datatable_filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.comman.commonscript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $__env->stopPush(); ?>
    <?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RealEstate\resources\views/admin/pages/index.blade.php ENDPATH**/ ?>