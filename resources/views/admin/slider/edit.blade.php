@extends('layouts.admin.master')

@section('title')
 {{__('slider.edit_slider')}}
@endsection

@push('css')
@endpush

@section('content')
<div class="container mt-4">
	<div class="row"> 
		<div class="col-sm-6">
	      <h5><b>{{__('slider.edit_slider')}}</b></h5>
	    </div>
	    <div class="col-sm-6">
	        
	      <a class="btn btn-primary float-end mb-4" href="{{ route('slider.index')}}"><i class="fa fa-arrow-left"></i> &nbsp;{{__('common.back')}}</a>
	    </div>
		<div class="col-sm-12 col-xl-12">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-body">
							 <!-- Start Form -->
							  {!! Form::model($slider,array('route' => array('slider.update', $slider->id),'role'=>"form",'id'=>'sliderForm','class'=>'form-horizontal','enctype' => 'multipart/form-data')) !!}
							    @method('PUT')
							    {!! Form::hidden('id', $slider->id , ['id' => 'id']) !!}
							      @include('admin.slider.form',[
							          'slider' => $slider,
							      ])
							  {!! Form::close() !!}
							  <!-- End Form -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@include('admin.slider.script')