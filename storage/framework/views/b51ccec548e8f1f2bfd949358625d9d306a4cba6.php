<?php $__env->startSection('title'); ?>
<?php echo e(__('socialMedia.title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
   
<div class="container-fluid">
  	<div class="row">
	    <div class="col-sm-6">
	      <h5><b><?php echo e(__('socialMedia.title')); ?></b></h5>
	    </div>
	</div>
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
            <!-- Start Form -->
			<?php echo Form::model($socialMedia,array('route' => 'social-media.store','role'=>"form",'id'=>'social-media-form','class'=>'form-horizontal','enctype' => 'multipart/form-data')); ?>


			<div class="row">
			  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
			    <div class="form-group">
			      <?php echo Form::label('facebook_link',trans("socialMedia.facebook_link")); ?>

			      <?php echo Form::text('facebook_link', null, ['class' => 'form-control','id' => 'facebook_link']); ?> 
			    </div>
			  </div>
			  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
			    <div class="form-group">
			      <?php echo Form::label('instagram_link',trans("socialMedia.instagram_link")); ?>

			      <?php echo Form::text('instagram_link', null, ['class' => 'form-control','id' => 'instagram_link']); ?> 
			    </div>
			  </div>
			  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
			    <div class="form-group">
			      <?php echo Form::label('youtube_link',trans("socialMedia.youtube_link")); ?>

			      <?php echo Form::text('youtube_link', null, ['class' => 'form-control','id' => 'youtube_link']); ?> 
			    </div>
			  </div>
			  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
			    <div class="form-group">
			      <?php echo Form::label('pinterest_link',trans("socialMedia.pinterest_link")); ?>

			      <?php echo Form::text('pinterest_link', null, ['class' => 'form-control','id' => 'pinterest_link']); ?> 
			    </div>
			  </div>
			  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
			    <div class="form-group">
			      <?php echo Form::label('linkedin_link',trans("socialMedia.linkedin_link")); ?>

			      <?php echo Form::text('linkedin_link', null, ['class' => 'form-control','id' => 'linkedin_link']); ?> 
			    </div>
			  </div>
			  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
			    <div class="form-group">
			      <?php echo Form::label('twitter_link',trans("socialMedia.twitter_link")); ?>

			      <?php echo Form::text('twitter_link', null, ['class' => 'form-control','id' => 'twitter_link']); ?> 
			    </div>
			  </div>
			</div>
			<div class="row">
			  <div class="col-sm-12">
			      <button type="submit" class="btn btn-primary"><?php echo e(( !isset($socialMedia)) ? __('common.save') : __('common.update')); ?></button>
			      <button class="btn btn-secondary" type="reset"><?php echo e(__('common.reset')); ?></button>
			  </div>
			</div>
			<?php echo Form::close(); ?>

			<!-- End Form -->
        </div>
      </div>
    </div>
  </div>
</div>

<?php $__env->startPush('scripts'); ?>
<?php echo $__env->make('admin.comman.commonscript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\airbnb service\resources\views/admin/social-media/index.blade.php ENDPATH**/ ?>