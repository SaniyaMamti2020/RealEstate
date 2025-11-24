<div class="row">
    <div class="col-sm-12">
        <div class="mb-3">
            <?php echo Form::label('username', trans('user.username')); ?><span class="text-danger">*</span>
            <?php echo Form::text('username', null, ['class' => 'form-control required', 'id' => 'username']); ?>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
        <?php
            $errorEmail = $errors->has('email') ? 'is-invalid' : '';
        ?>
        <div class="mb-3">
            <?php echo Form::label('email', trans('user.email')); ?><span class="text-danger">*</span>
            <?php echo Form::email('email', null, ['class' => 'form-control required  ' . $errorEmail, 'id' => 'email']); ?>

            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
        <div class="mb-3">
            <?php echo Form::label('phone_no', trans('user.phone_no')); ?><span class="text-danger">*</span>
            <?php echo Form::text('phone_no', null, ['class' => 'form-control required', 'id' => 'phone_no', 'maxlength' => 10]); ?>

        </div>
    </div>
</div>
<div class="row">
    <?php if(isset($user) && $user->password != ''): ?>
        <input type="hidden" value="<?php echo e($user->id); ?>" id="user_id">
        <div class="col-sm-12">
            <div class="mb-3">
                <?php echo Form::label('password', trans('user.password')); ?>

                <?php echo e(Form::password('password', ['id' => 'password', 'class' => 'form-control'])); ?>

            </div>
        </div>
    <?php else: ?>
        <div class="col-sm-12">
            <div class="mb-3">
                <?php echo Form::label('password', trans('user.password')); ?><span class="text-danger">*</span>
                <?php echo e(Form::password('password', ['id' => 'password', 'class' => 'form-control'])); ?>

            </div>
        </div>
    <?php endif; ?>
</div>
<?php if(isset($user) && !empty($user)): ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-3">
                <?php echo Form::label('roles', trans('Roles')); ?><span class="text-danger">*</span>
                <?php echo Form::select('roles', $roles, $userRole, ['class' => 'form-control roles required', 'id' => 'roles']); ?>

            </div>
        </div>
    </div>
<?php else: ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-3">
                <?php echo Form::label('roles', trans('Roles')); ?><span class="text-danger">*</span>
                <?php echo Form::select('roles', $roles, null, ['class' => 'form-control roles required', 'id' => 'roles']); ?>

            </div>
        </div>
    </div>
<?php endif; ?>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-8">
        <div class="mb-3">
            <?php echo Form::label('company_logo', trans('user.company_logo')); ?><span class="text-danger">*</span>
            <?php echo Form::file('company_logo', ['class' => 'form-control required', 'id' => 'company_logo']); ?>

        </div>
        
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-4">
        <?php if(isset($user) && $user->company_logo != '' && !empty($user->company_logo)): ?>
            <img alt="Image"
                src="<?php echo e(isset($user['company_logo']) && !empty($user['company_logo']) ? asset('/upload/user/' . $user['company_logo']) : asset('/media/no-image.png')); ?>"
                class="pt-10 align-self-end" id="company_logo_preview" name="company_logo_preview" style="width: 50%;">
        <?php else: ?>
            <img alt="Image" src="<?php echo e(asset('/media/no-image.png')); ?>" class="pt-10 align-self-end"
                id="company_logo_preview" name="company_logo_preview" style="width: 50%;">
        <?php endif; ?>
    </div>

    <div class="col-lg-8 col-md-8 col-sm-8 col-8">
        <div class="mb-3">
            <?php echo Form::label('owner_photo', trans('user.owner_photo')); ?><span class="text-danger">*</span>
            <?php echo Form::file('owner_photo', ['class' => 'form-control required', 'id' => 'owner_photo']); ?>

        </div>
        
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-4">
        <?php if(isset($user) && $user->owner_photo != '' && !empty($user->owner_photo)): ?>
            <img alt="owner_photo"
                src="<?php echo e(isset($user['owner_photo']) && !empty($user['owner_photo']) ? asset('/upload/user/' . $user['owner_photo']) : asset('/media/no-image.png')); ?>"
                class="pt-10 align-self-end" id="owner_photo_preview" name="owner_photo_preview" style="width: 50%;">
        <?php else: ?>
            <img alt="Image" src="<?php echo e(asset('/media/no-image.png')); ?>" class="pt-10 align-self-end"
                id="owner_photo_preview" name="owner_photo_preview" style="width: 50%;">
        <?php endif; ?>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="mb-3">
            <?php echo Form::label('address', trans('user.address')); ?><span class="text-danger">*</span>
            <?php echo Form::textarea('address', null, ['class' => 'form-control required', 'id' => 'address', 'rows' => '3']); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <button type="submit"
            class="btn btn-primary"><?php echo e(!isset($user) ? __('common.save') : __('common.update')); ?></button>
        <button class="btn btn-secondary" type="reset"><?php echo e(__('common.reset')); ?></button>
    </div>
</div>
<style type="text/css">
    .error {
        margin: 2px 0 2px;
        color: #000;
    }
</style>
<?php /**PATH C:\xampp\htdocs\RealEstate\resources\views/admin/user/form.blade.php ENDPATH**/ ?>