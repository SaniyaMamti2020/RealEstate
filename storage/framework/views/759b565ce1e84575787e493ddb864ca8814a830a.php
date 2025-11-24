<div class="row">
    <div class="col-sm-12">
        <div class="mb-3">
            <?php echo Form::label('name', trans('role.role_name')); ?><span class="text-danger">*</span>
            <?php echo Form::text('name', null, ['class' => 'form-control required', 'id' => 'name']); ?>

        </div>
    </div>
</div>

<?php if(isset($role)): ?>
    <div class="form-group row">
        <div class="col-md-12">
            <label class="col-form-label">Permission</label>
            <table class="table table-sm table-bordered table-permission">
                <thead>
                    <tr>
                        <th scope="col">Module Name</th>
                        <th scope="col">Given Permission</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $a = 1;
                    ?>
                    <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $module_nm = str_replace('-list', ' ', $value->name);
                        ?>
                        <?php if($a == 1): ?>
                            <tr>
                                <th scope="row align-middle"> <?php echo e($module_nm); ?></th>
                                <td class="ms-3">
                        <?php endif; ?>

                        <?php echo e(Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name ms-3'])); ?>

                        <?php echo e($value->name); ?>

                        <?php if($a == 4): ?>
                            <?php
                                $a = 0;
                            ?>
                            </td>
                            </tr>
                        <?php endif; ?>
                        <?php
                            $a++;
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>


        </div>
    </div>
<?php else: ?>
    <div class="form-group row">
        <div class="col-md-12">
            <label class="col-form-label">Permission</label>
            <table class="table table-sm table-bordered table-permission">
                <thead>
                    <tr>
                        <th scope="col">Module Name</th>
                        <th scope="col">Given Permission</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $a = 1;
                    ?>
                    <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $module_nm = str_replace('-list', ' ', $value->name);
                        ?>
                        <?php if($a == 1): ?>
                            <tr>
                                <th scope="row align-middle"> <?php echo e($module_nm); ?></th>
                                <td class="ms-3">
                        <?php endif; ?>

                        <?php echo e(Form::checkbox('permission[]', $value->id, false, ['class' => 'name ms-3'])); ?>

                        <?php echo e($value->name); ?>

                        <?php if($a == 4): ?>
                            <?php
                                $a = 0;
                            ?>
                            </td>
                            </tr>
                        <?php endif; ?>
                        <?php
                            $a++;
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>


        </div>
    </div>
<?php endif; ?>
<div class="row">
    <div class="col-sm-12">
        <button type="submit"
            class="btn btn-primary"><?php echo e(!isset($page) ? __('common.save') : __('common.update')); ?></button>
        <button class="btn btn-secondary" type="reset"><?php echo e(__('common.reset')); ?></button>
    </div>
</div>
<style type="text/css">
    .error {
        margin: 2px 0 2px;
        color: #000;
    }
</style>
<?php /**PATH C:\xampp\htdocs\RealEstate\resources\views/admin/roles/form.blade.php ENDPATH**/ ?>