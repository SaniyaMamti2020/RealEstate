 
<?php $__env->startSection('title'); ?> 
<?php echo e(__('generalSetting.title')); ?> 
<?php $__env->stopSection(); ?> 
<?php $__env->startPush('css'); ?> 
<?php $__env->stopPush(); ?> 
<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <h5><b><?php echo e(__('generalSetting.title')); ?></b></h5>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <!-- Start Form -->
                <?php echo Form::model($generalSetting,array('route' => 'general-setting.store','role'=>"form",'id'=>'generalSettingForm','class'=>'form-horizontal generalSettingForm','enctype' => 'multipart/form-data')); ?>


                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                            <?php echo Form::label('project_title',trans("generalSetting.project_title")); ?>

                            <?php echo Form::text('project_title', null, ['class' => 'form-control','id' => 'project_title','maxlength'=>'200']); ?>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                            <?php echo Form::label('email',trans("generalSetting.email")); ?>

                            <?php echo Form::text('email', null, ['class' => 'form-control','id' => 'email',]); ?>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                            <?php echo Form::label('phone_no',trans("generalSetting.phone_no")); ?> <?php echo Form::text('phone_no', null, ['class' => 'form-control number','id' => 'phone_no','maxlength'=>'10']); ?>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <?php echo Form::label('address',trans("generalSetting.address")); ?>

                            <?php echo Form::textarea('address', null, ['class' => 'form-control','id' => 'address','rows'=>'3']); ?>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <?php echo Form::label('info',trans("generalSetting.info")); ?>

                            <?php echo Form::textarea('info', null, ['class' => 'form-control','id' => 'info','rows'=>'3']); ?>

                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                        <?php echo Form::label('icon_img',trans("generalSetting.icon_img")); ?><br />
                        <figcaption>
                            <?php echo Form::file('icon_img',['id'=>'icon_img','class'=>'form-control']); ?>

                        </figcaption>
                        <img alt="Logo" src="<?php echo e((isset($generalSetting['icon_img']) && !empty($generalSetting['icon_img'])) ? asset("/upload/generalsetting/".$generalSetting['icon_img']) : asset('/media/no-image.png')); ?>" class="pt-10
                        align-self-end" id="icon_preview" name="icon_preview" style="width: 25%;">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                        <?php echo Form::label('logo_img',trans("generalSetting.logo_img")); ?><br />
                        <figcaption>
                            <?php echo Form::file('logo_img',['id'=>'logo_img','class'=>'form-control']); ?>

                        </figcaption>
                        <img alt="Logo" src="<?php echo e((isset($generalSetting['logo_img']) && !empty($generalSetting['logo_img'])) ? asset("/upload/generalsetting/".$generalSetting['logo_img']) : asset('/media/no-image.png')); ?>" class="pt-10
                        align-self-end" id="logo_preview" name="logo_preview" style="width: 25%;">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                        <?php echo Form::label('footer_logo_img',trans("generalSetting.footer_logo_img")); ?><br />
                        <figcaption>
                            <?php echo Form::file('footer_logo_img',['id'=>'footer_logo_img','class'=>'form-control']); ?>

                        </figcaption>
                        <img alt="Logo" src="<?php echo e((isset($generalSetting['footer_logo_img']) && !empty($generalSetting['footer_logo_img'])) ? asset("/upload/generalsetting/".$generalSetting['footer_logo_img']) : asset('/media/no-image.png')); ?>" class="pt-10
                        align-self-end" id="footer_logo_preview" name="footer_logo_preview" style="width: 25%;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="mb-3">
                            <?php echo Form::label('page_meta_tag',trans("pages.page_meta_tag")); ?>

                            <?php echo Form::text('page_meta_tag', null, ['class' => 'form-control','id' => 'page_meta_tag','rows'=>'3','maxlength'=> config('constants.meta_tag_max_length')]); ?>

                        </div>  
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="mb-3">
                            <?php echo Form::label('page_meta_title',trans("pages.page_meta_title")); ?>

                            <?php echo Form::text('page_meta_title', null, ['class' => 'form-control','id' => 'page_meta_title','rows'=>'3','maxlength'=>config('constants.meta_title_max_length')]); ?>

                        </div>  
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="mb-3">
                            <?php echo Form::label('page_meta_desc',trans("pages.page_meta_desc")); ?>

                            <?php echo Form::textarea('page_meta_desc', null, ['class' => 'form-control','id' => 'page_meta_desc','rows'=>'3','maxlength'=>config('constants.meta_desc_max_length')]); ?>

                        </div>  
                    </div>
                </div>
            
	            <div class="row">
	                <div class="col-sm-12">
	                    <button type="submit" class="btn btn-primary"><?php echo e(( !isset($generalSetting)) ? __('common.save') : __('common.update')); ?></button>
	                    <button class="btn btn-secondary" type="reset"><?php echo e(__('common.reset')); ?></button>
	                </div>
	            </div>
            	<?php echo Form::close(); ?>

            	<!-- End Form -->
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    .error {
        margin: 2px 0 2px;
        color: #000;
    }
</style>
<?php $__env->startPush('scripts'); ?> 
<?php echo $__env->make('admin.general-setting.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php echo $__env->make('admin.comman.commonscript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php $__env->stopPush(); ?> 
<?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\airbnb service\resources\views/admin/general-setting/index.blade.php ENDPATH**/ ?>