<div class="row">
    <div class="col-sm-12">
        <div class="mb-3">
            {!! Form::label('username', trans('user.username')) !!}<span class="text-danger">*</span>
            {!! Form::text('username', null, ['class' => 'form-control required', 'id' => 'username']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
        @php
            $errorEmail = $errors->has('email') ? 'is-invalid' : '';
        @endphp
        <div class="mb-3">
            {!! Form::label('email', trans('user.email')) !!}<span class="text-danger">*</span>
            {!! Form::email('email', null, ['class' => 'form-control required  ' . $errorEmail, 'id' => 'email']) !!}
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
        <div class="mb-3">
            {!! Form::label('phone_no', trans('user.phone_no')) !!}<span class="text-danger">*</span>
            {!! Form::text('phone_no', null, ['class' => 'form-control required', 'id' => 'phone_no', 'maxlength' => 10]) !!}
        </div>
    </div>
</div>
<div class="row">
    @if (isset($user) && $user->password != '')
        <input type="hidden" value="{{ $user->id }}" id="user_id">
        <div class="col-sm-12">
            <div class="mb-3">
                {!! Form::label('password', trans('user.password')) !!}
                {{ Form::password('password', ['id' => 'password', 'class' => 'form-control']) }}
            </div>
        </div>
    @else
        <div class="col-sm-12">
            <div class="mb-3">
                {!! Form::label('password', trans('user.password')) !!}<span class="text-danger">*</span>
                {{ Form::password('password', ['id' => 'password', 'class' => 'form-control']) }}
            </div>
        </div>
    @endif
</div>
@if (isset($user) && !empty($user))
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-3">
                {!! Form::label('roles', trans('Roles')) !!}<span class="text-danger">*</span>
                {!! Form::select('roles', $roles, $userRole, ['class' => 'form-control roles required', 'id' => 'roles']) !!}
            </div>
        </div>
    </div>
@else
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-3">
                {!! Form::label('roles', trans('Roles')) !!}<span class="text-danger">*</span>
                {!! Form::select('roles', $roles, null, ['class' => 'form-control roles required', 'id' => 'roles']) !!}
            </div>
        </div>
    </div>
@endif
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-8">
        <div class="mb-3">
            {!! Form::label('company_logo', trans('user.company_logo')) !!}<span class="text-danger">*</span>
            {!! Form::file('company_logo', ['class' => 'form-control required', 'id' => 'company_logo']) !!}
        </div>
        {{-- <p>(Suggested Images Size 65 pixel width x 65 pixel height for better display)</p> --}}
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-4">
        @if (isset($user) && $user->company_logo != '' && !empty($user->company_logo))
            <img alt="Image"
                src="{{ isset($user['company_logo']) && !empty($user['company_logo']) ? asset('/upload/user/' . $user['company_logo']) : asset('/media/no-image.png') }}"
                class="pt-10 align-self-end" id="company_logo_preview" name="company_logo_preview" style="width: 50%;">
        @else
            <img alt="Image" src="{{ asset('/media/no-image.png') }}" class="pt-10 align-self-end"
                id="company_logo_preview" name="company_logo_preview" style="width: 50%;">
        @endif
    </div>

    <div class="col-lg-8 col-md-8 col-sm-8 col-8">
        <div class="mb-3">
            {!! Form::label('owner_photo', trans('user.owner_photo')) !!}<span class="text-danger">*</span>
            {!! Form::file('owner_photo', ['class' => 'form-control required', 'id' => 'owner_photo']) !!}
        </div>
        {{-- <p>(Suggested Images Size 65 pixel width x 65 pixel height for better display)</p> --}}
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-4">
        @if (isset($user) && $user->owner_photo != '' && !empty($user->owner_photo))
            <img alt="owner_photo"
                src="{{ isset($user['owner_photo']) && !empty($user['owner_photo']) ? asset('/upload/user/' . $user['owner_photo']) : asset('/media/no-image.png') }}"
                class="pt-10 align-self-end" id="owner_photo_preview" name="owner_photo_preview" style="width: 50%;">
        @else
            <img alt="Image" src="{{ asset('/media/no-image.png') }}" class="pt-10 align-self-end"
                id="owner_photo_preview" name="owner_photo_preview" style="width: 50%;">
        @endif
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="mb-3">
            {!! Form::label('address', trans('user.address')) !!}<span class="text-danger">*</span>
            {!! Form::textarea('address', null, ['class' => 'form-control required', 'id' => 'address', 'rows' => '3']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <button type="submit"
            class="btn btn-primary">{{ !isset($user) ? __('common.save') : __('common.update') }}</button>
        <button class="btn btn-secondary" type="reset">{{ __('common.reset') }}</button>
    </div>
</div>
<style type="text/css">
    .error {
        margin: 2px 0 2px;
        color: #000;
    }
</style>
