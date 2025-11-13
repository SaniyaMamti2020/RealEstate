@extends('layouts.admin.master')

@section('title')
{{__('socialMedia.title')}}
@endsection

@push('css')
@endpush

@section('content')
   
<div class="container-fluid">
  	<div class="row">
	    <div class="col-sm-6">
	      <h5><b>{{__('socialMedia.title')}}</b></h5>
	    </div>
	</div>
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
            <!-- Start Form -->
			{!! Form::model($socialMedia,array('route' => 'social-media.store','role'=>"form",'id'=>'social-media-form','class'=>'form-horizontal','enctype' => 'multipart/form-data')) !!}

			<div class="row">
			  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
			    <div class="form-group">
			      {!! Form::label('facebook_link',trans("socialMedia.facebook_link"))!!}
			      {!! Form::text('facebook_link', null, ['class' => 'form-control','id' => 'facebook_link']) !!} 
			    </div>
			  </div>
			  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
			    <div class="form-group">
			      {!! Form::label('instagram_link',trans("socialMedia.instagram_link"))!!}
			      {!! Form::text('instagram_link', null, ['class' => 'form-control','id' => 'instagram_link']) !!} 
			    </div>
			  </div>
			  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
			    <div class="form-group">
			      {!! Form::label('youtube_link',trans("socialMedia.youtube_link"))!!}
			      {!! Form::text('youtube_link', null, ['class' => 'form-control','id' => 'youtube_link']) !!} 
			    </div>
			  </div>
			  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
			    <div class="form-group">
			      {!! Form::label('pinterest_link',trans("socialMedia.pinterest_link"))!!}
			      {!! Form::text('pinterest_link', null, ['class' => 'form-control','id' => 'pinterest_link']) !!} 
			    </div>
			  </div>
			  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
			    <div class="form-group">
			      {!! Form::label('linkedin_link',trans("socialMedia.linkedin_link"))!!}
			      {!! Form::text('linkedin_link', null, ['class' => 'form-control','id' => 'linkedin_link']) !!} 
			    </div>
			  </div>
			  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
			    <div class="form-group">
			      {!! Form::label('twitter_link',trans("socialMedia.twitter_link"))!!}
			      {!! Form::text('twitter_link', null, ['class' => 'form-control','id' => 'twitter_link']) !!} 
			    </div>
			  </div>
			</div>
			<div class="row">
			  <div class="col-sm-12">
			      <button type="submit" class="btn btn-primary">{{( !isset($socialMedia)) ? __('common.save') : __('common.update')}}</button>
			      <button class="btn btn-secondary" type="reset">{{__('common.reset')}}</button>
			  </div>
			</div>
			{!! Form::close() !!}
			<!-- End Form -->
        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
@include('admin.comman.commonscript')
@endpush
@include('flash-message') 
@endsection  