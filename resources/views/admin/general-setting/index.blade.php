@extends('layouts.admin.master') 
@section('title') 
{{__('generalSetting.title')}} 
@endsection 
@push('css') 
@endpush 
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <h5><b>{{__('generalSetting.title')}}</b></h5>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <!-- Start Form -->
                {!! Form::model($generalSetting,array('route' => 'general-setting.store','role'=>"form",'id'=>'generalSettingForm','class'=>'form-horizontal generalSettingForm','enctype' => 'multipart/form-data')) !!}

                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                            {!! Form::label('project_title',trans("generalSetting.project_title"))!!}
                            {!! Form::text('project_title', null, ['class' => 'form-control','id' => 'project_title','maxlength'=>'200']) !!}
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                            {!! Form::label('email',trans("generalSetting.email"))!!}
                            {!! Form::text('email', null, ['class' => 'form-control','id' => 'email',]) !!}
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <div class="form-group">
                            {!! Form::label('phone_no',trans("generalSetting.phone_no"))!!} {!! Form::text('phone_no', null, ['class' => 'form-control number','id' => 'phone_no','maxlength'=>'10']) !!}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            {!! Form::label('address',trans("generalSetting.address"))!!}
                            {!! Form::textarea('address', null, ['class' => 'form-control','id' => 'address','rows'=>'3']) !!}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            {!! Form::label('info',trans("generalSetting.info"))!!}
                            {!! Form::textarea('info', null, ['class' => 'form-control','id' => 'info','rows'=>'3']) !!}
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                        {!! Form::label('icon_img',trans("generalSetting.icon_img"))!!}<br />
                        <figcaption>
                            {!! Form::file('icon_img',['id'=>'icon_img','class'=>'form-control'])!!}
                        </figcaption>
                        <img alt="Logo" src="{{(isset($generalSetting['icon_img']) && !empty($generalSetting['icon_img'])) ? asset("/upload/generalsetting/".$generalSetting['icon_img']) : asset('/media/no-image.png')}}" class="pt-10
                        align-self-end" id="icon_preview" name="icon_preview" style="width: 25%;">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                        {!! Form::label('logo_img',trans("generalSetting.logo_img"))!!}<br />
                        <figcaption>
                            {!! Form::file('logo_img',['id'=>'logo_img','class'=>'form-control'])!!}
                        </figcaption>
                        <img alt="Logo" src="{{(isset($generalSetting['logo_img']) && !empty($generalSetting['logo_img'])) ? asset("/upload/generalsetting/".$generalSetting['logo_img']) : asset('/media/no-image.png')}}" class="pt-10
                        align-self-end" id="logo_preview" name="logo_preview" style="width: 25%;">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 mb-3">
                        {!! Form::label('footer_logo_img',trans("generalSetting.footer_logo_img"))!!}<br />
                        <figcaption>
                            {!! Form::file('footer_logo_img',['id'=>'footer_logo_img','class'=>'form-control'])!!}
                        </figcaption>
                        <img alt="Logo" src="{{(isset($generalSetting['footer_logo_img']) && !empty($generalSetting['footer_logo_img'])) ? asset("/upload/generalsetting/".$generalSetting['footer_logo_img']) : asset('/media/no-image.png')}}" class="pt-10
                        align-self-end" id="footer_logo_preview" name="footer_logo_preview" style="width: 25%;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="mb-3">
                            {!! Form::label('page_meta_tag',trans("pages.page_meta_tag"))!!}
                            {!! Form::text('page_meta_tag', null, ['class' => 'form-control','id' => 'page_meta_tag','rows'=>'3','maxlength'=> config('constants.meta_tag_max_length')]) !!}
                        </div>  
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="mb-3">
                            {!! Form::label('page_meta_title',trans("pages.page_meta_title"))!!}
                            {!! Form::text('page_meta_title', null, ['class' => 'form-control','id' => 'page_meta_title','rows'=>'3','maxlength'=>config('constants.meta_title_max_length')]) !!}
                        </div>  
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="mb-3">
                            {!! Form::label('page_meta_desc',trans("pages.page_meta_desc"))!!}
                            {!! Form::textarea('page_meta_desc', null, ['class' => 'form-control','id' => 'page_meta_desc','rows'=>'3','maxlength'=>config('constants.meta_desc_max_length')]) !!}
                        </div>  
                    </div>
                </div>
            
	            <div class="row">
	                <div class="col-sm-12">
	                    <button type="submit" class="btn btn-primary">{{( !isset($generalSetting)) ? __('common.save') : __('common.update')}}</button>
	                    <button class="btn btn-secondary" type="reset">{{__('common.reset')}}</button>
	                </div>
	            </div>
            	{!! Form::close() !!}
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
@push('scripts') 
@include('admin.general-setting.script') 
@include('admin.comman.commonscript') 
@endpush 
@include('flash-message') 
@endsection
