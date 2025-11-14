@extends('layouts.admin.master')

@section('title')
    {{ __('category.new_category') }}
@endsection

@push('css')
@endpush

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-6">
                <h5><b>{{ __('category.new_category') }}</b></h5>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-end mb-4" href="{{ route('category.index') }}">
                    <i class="fa fa-arrow-left"></i> &nbsp; {{ __('common.back') }}</a>
            </div>
            <div class="col-sm-12 col-xl-12">
                <div class="row">
                    <div class="col-md-12">
                        @include('components.error')
                    </div>
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                {!! Form::open([
                                    'route' => 'category.store',
                                    'role' => 'form',
                                    'id' => 'categoryForm',
                                    'class' => 'form-horizontal',
                                    'enctype' => 'multipart/form-data',
                                ]) !!}

                                @include('admin.category.form', [])
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('admin.category.script')
