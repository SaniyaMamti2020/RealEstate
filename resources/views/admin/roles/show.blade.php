@extends('layouts.admin.master')

@section('title')
    {{ __('page.page') }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <style type="text/css">
        .dropdown-basic .dropdown .dropbtn {
            color: #fff;
            padding: 5px 10px !important;
            border: none;
            cursor: pointer;
        }

        .dataTables_wrapper button {
            background-color: #fff !important;
        }

        .dataTables_filter {
            display: none;
        }

        .select2-selection__rendered {
            display: none;
        }
    </style>
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h5><b>{{ __('page.page') }}</b></h5>
            </div>
            <div class="col-sm-6">

                <a class="btn btn-primary float-end mb-4" href="{{ route('roles.index') }}">{{ __('common.back') }}</a>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Permission</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td class="fs-5">
                                            @if (!empty($rolePermissions))
                                                @foreach ($rolePermissions as $v)
                                                    <span class="badge badge-secondary">{{ $v->name }}</span>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
