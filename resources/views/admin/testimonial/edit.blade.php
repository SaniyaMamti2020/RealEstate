@extends('layouts.admin.master')

@section('title')
    {{ __('testimonial.edit_testimonial') }}
@endsection

@push('css')
@endpush

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-6">
                <h5><b>{{ __('testimonial.edit_testimonial') }}</b></h5>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-end mb-4" href="{{ route('testimonial.index') }}"><i
                        class="fa fa-arrow-left"></i> &nbsp;{{ __('common.back') }}</a>
            </div>
            <div class="col-sm-12 col-xl-12">
                <div class="row">
                    <div class="col-md-12">
                        @include('components.error')
                    </div>
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Start Form -->
                                {!! Form::model($testimonial, [
                                    'route' => ['testimonial.update', $testimonial->id],
                                    'role' => 'form',
                                    'id' => 'testimonialForm',
                                    'class' => 'form-horizontal',
                                    'enctype' => 'multipart/form-data',
                                ]) !!}
                                @method('PUT')
                                {!! Form::hidden('id', $testimonial->id, ['id' => 'id']) !!}
                                @include('admin.testimonial.form', [
                                    'testimonial' => $testimonial,
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
@include('admin.testimonial.script')
