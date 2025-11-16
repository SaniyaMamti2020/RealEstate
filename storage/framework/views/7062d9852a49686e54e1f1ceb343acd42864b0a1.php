<?php $__env->startSection('title'); ?>
    <?php echo e(__('category.edit_category')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-6">
                <h5><b><?php echo e(__('category.edit_category')); ?></b></h5>
            </div>
            <div class="col-sm-6">

                <a class="btn btn-primary float-end mb-4" href="<?php echo e(route('category.index')); ?>"><i class="fa fa-arrow-left"></i>
                    &nbsp;<?php echo e(__('common.back')); ?></a>
            </div>
            <div class="col-sm-12 col-xl-12">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $__env->make('components.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Start Form -->
                                <?php echo Form::model($category, [
                                    'route' => ['category.update', $category->id],
                                    'role' => 'form',
                                    'id' => 'categoryForm',
                                    'class' => 'form-horizontal',
                                    'enctype' => 'multipart/form-data',
                                ]); ?>

                                <?php echo method_field('PUT'); ?>
                                <?php echo Form::hidden('id', $category->id, ['id' => 'id']); ?>

                                <?php echo $__env->make('admin.category.form', [
                                    'category' => $category,
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php echo Form::close(); ?>

                                <!-- End Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.category.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RealEstate\resources\views/admin/category/edit.blade.php ENDPATH**/ ?>