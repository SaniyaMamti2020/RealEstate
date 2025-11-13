<div class="row">
	<div class="col-sm-12">
		<div class="mb-3">
			{!! Form::label('username',trans("user.username"))!!}<span class="text-danger">*</span>
			{!! Form::text('username', null, ['class' => 'form-control required','id' => 'username']) !!}
		</div>	
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
			@php
			$errorEmail = $errors->has('email') ?  'is-invalid' : '';
			@endphp
		<div class="mb-3">
			{!! Form::label('email',trans("user.email"))!!}<span class="text-danger">*</span>
			{!! Form::email('email', null, ['class' => 'form-control required  '.$errorEmail,'id' => 'email']) !!}

			@error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    	@enderror
		</div>	
	</div>
</div>
<div class="row">
	@if(isset($user) && $user->password != '')
	<input type="hidden" value="{{$user->id}}" id="user_id">
	<div class="col-sm-12">
		<div class="mb-3">
			{!! Form::label('password',trans("user.password"))!!}
			{{ Form::password('password', array('id' => 'password', "class" => "form-control")) }}
		</div>	
	</div>
	@else
	<div class="col-sm-12">
		<div class="mb-3">
			{!! Form::label('password',trans("user.password"))!!}<span class="text-danger">*</span>
			{{ Form::password('password', array('id' => 'password', "class" => "form-control")) }}
		</div>	
	</div>
	@endif
</div>
@if(isset($user) && !empty($user))
<div class="row">
	<div class="col-sm-12">
		<div class="mb-3">
			{!! Form::label('roles',trans("Roles"))!!}<span class="text-danger">*</span>
			{!! Form::select('roles',$roles, $userRole, ['class' => 'form-control roles required','id' => 'roles']) !!}
		</div>	
	</div>
</div>
@else
<div class="row">
	<div class="col-sm-12">
		<div class="mb-3">
			{!! Form::label('roles',trans("Roles"))!!}<span class="text-danger">*</span>
			{!! Form::select('roles',$roles, null, ['class' => 'form-control roles required','id' => 'roles']) !!}
		</div>	
	</div>
</div>
@endif
  
<div class="row">
  <div class="col-sm-12">
      <button type="submit" class="btn btn-primary">{{( !isset($user)) ? __('common.save') : __('common.update')}}</button>
      <button class="btn btn-secondary" type="reset">{{__('common.reset')}}</button>
  </div>
</div>
<style type="text/css">
	.error{
	margin: 2px 0 2px;
	color: #000;
}

</style>