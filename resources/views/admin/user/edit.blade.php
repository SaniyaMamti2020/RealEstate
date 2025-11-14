@extends('layouts.admin.master')

@section('title')
    {{ __('user.edit_user') }}
@endsection

@push('css')
@endpush

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-6">
                <h5><b>{{ __('user.edit_user') }}</b></h5>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-end mb-4" href="{{ route('user.index') }}"><i class="fa fa-arrow-left"></i>
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
                                {!! Form::model($user, [
                                    'route' => ['user.update', $user->id],
                                    'role' => 'form',
                                    'id' => 'userForm',
                                    'class' => 'form-horizontal',
                                    'enctype' => 'multipart/form-data',
                                ]) !!}
                                @method('PUT')
                                {!! Form::hidden('id', $user->id, ['id' => 'id']) !!}
                                @include('admin.user.form', [
                                    'user' => $user,
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
@include('admin.user.script')
