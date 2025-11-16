<?php $__env->startSection('title'); ?>
 <?php echo e(__('about.add_about')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
	<div class="row">
		<div class="col-sm-6">
	      	<h5><b><?php echo e(__('about.add_about')); ?></b></h5>
	    </div>
		<div class="col-sm-12 col-xl-12">
		    <div class="row">
		    	<div class="col-md-12">
			      <?php echo $__env->make('components.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			    </div>
		      	<div class="col-sm-12">
		        	<div class="card">
		          		<div class="card-body">
			            <?php echo Form::model($about,array('route' => 'about.store','role'=>"form",'id'=>'pagesForm','class'=>'form-horizontal','enctype' => 'multipart/form-data')); ?>

							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="mb-3">
										<?php echo Form::label('page_name',trans("about.page_name")); ?><span class="text-danger">*</span>
										<?php echo Form::text('page_name', null, ['class' => 'form-control required','id' => 'page_name','maxlength'=>'75']); ?>

									</div>	
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="mb-3">
										<?php echo Form::label('sub_title',trans("about.sub_title")); ?><span class="text-danger">*</span>
										<?php echo Form::text('sub_title', null, ['class' => 'form-control','id' => 'sub_title','maxlength'=>'75']); ?>

									</div>	
								</div>
							</div>
							<div class="row">
								<div class="col-lg-8 col-md-8 col-sm-8 col-8">
									<div class="mb-3">
										<?php echo Form::label('page_img',trans("pages.page_img")); ?><span class="text-danger">*</span>
										<?php if(isset($about) && $about->page_img != '' && !empty($about->page_img)): ?>
							      	<?php echo Form::file('page_img', ['class' => 'form-control ','id'=>'page_img']); ?>

							      <?php else: ?>
							      	<?php echo Form::file('page_img', ['class' => 'form-control required ','id'=>'page_img']); ?>

							      <?php endif; ?>  
							      (Suggested Images Size 600 pixel width x 600 pixel height for better display)
							    	</div>	
								</div>  
							  <div class="col-lg-4 col-md-4 col-sm-4 col-4">  
							  	<?php if(isset($about) && $about->page_img != '' && !empty($about->page_img)): ?>
											<img alt="Image" src="<?php echo e((isset($about['page_img']) && !empty($about['page_img'])) ? asset("/upload/about/".$about['page_img'])  : asset('/media/no-image.png')); ?>" class="pt-10 align-self-end" id="img_preview" name="img_preview" style="width: 50%;">	
										
									<?php else: ?>
							    	<img src="" class="pt-10 align-self-end" id="img_preview" name="img_preview" style="width: 50%;">	
							    <?php endif; ?>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-12">
									<div class="mb-3">
										<?php echo Form::label('page_desc',trans("pages.page_desc")); ?>

										<?php echo Form::textarea('page_desc', null, ['class' => 'form-control','id' => 'page_desc','rows'=>'3']); ?>

									</div>	
								</div>
							</div>
							<div class="row">
							  <div class="col-sm-12">
							      <button type="submit" class="btn btn-primary"><?php echo e(( !isset($pages)) ? __('common.save') : __('common.update')); ?></button>
							      <button class="btn btn-secondary" type="reset"><?php echo e(__('common.reset')); ?></button>
							  </div>
							</div>
							<style type="text/css">
								.error{
									margin: 2px 0 2px;
									color: #000;
								}
								.cke_inner {
									border:1px solid; 
									border-color:#e6edef;
								}
							</style>
							<?php echo Form::close(); ?>

			          	</div>
			        </div>
		      	</div>
		    </div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.about.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\RealEstate\resources\views/admin/about/index.blade.php ENDPATH**/ ?>