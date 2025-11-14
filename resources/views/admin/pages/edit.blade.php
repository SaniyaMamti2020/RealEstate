@extends('layouts.admin.master')

@section('title')
    {{ __('pages.edit_pages') }}
@endsection

@push('css')
@endpush

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-6">
                <h5><b>{{ __('pages.edit_pages') }}</b></h5>
            </div>
            <div class="col-sm-6">

                <a class="btn btn-primary float-end mb-4" href="{{ route('pages.index') }}"><i class="fa fa-arrow-left"></i>
                    &nbsp;{{ __('common.back') }}</a>
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
                                {!! Form::model($pages, [
                                    'route' => ['pages.update', $pages->id],
                                    'role' => 'form',
                                    'id' => 'pagesForm',
                                    'class' => 'form-horizontal',
                                    'enctype' => 'multipart/form-data',
                                ]) !!}
                                @method('PUT')
                                {!! Form::hidden('id', $pages->id, ['id' => 'id']) !!}
                                @include('admin.pages.form', [
                                    'pages' => $pages,
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
@include('admin.pages.script')
