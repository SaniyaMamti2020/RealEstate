@extends('layouts.admin.master')

@section('title')
    {{ __('role.edit_role') }}
@endsection

@push('css')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h5><b>{{ __('role.edit_role') }}</b></h5>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-end mb-4" href="{{ route('roles.index') }}"><i class="fa fa-arrow-left"></i>
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
                                {!! Form::model($role, [
                                    'route' => ['roles.update', $role->id],
                                    'role' => 'form',
                                    'id' => 'roleForm',
                                    'class' => 'form-horizontal',
                                    'enctype' => 'multipart/form-data',
                                ]) !!}
                                @method('PUT')
                                {!! Form::hidden('id', $role->id, ['id' => 'id']) !!}
                                @include('admin.roles.form', [
                                    'role' => $role,
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
@include('admin.roles.script')
