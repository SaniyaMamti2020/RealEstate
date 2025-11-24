@extends('layouts.admin.master')

@section('title')
    {{ __('user.user') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h5><b>{{ __('user.user') }}</b></h5>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-end mb-4" href="{{ route('user.create') }}">{{ __('common.add') }}</a>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table class="display" id="dataTableBuilder">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="col-sm-12 datatable-form-filter no-padding">
                                            {!! Form::text('filter_username', Request::get('filter_username', null), ['class' => 'form-control']) !!}
                                        </div>
                                    </th>
                                    <th>
                                        <div class="col-sm-12 datatable-form-filter no-padding">
                                            {!! Form::text('filter_email', Request::get('filter_email', null), ['class' => 'form-control']) !!}
                                        </div>
                                    </th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>{{ __('user.username') }}</th>
                                    <th>{{ __('user.email') }}</th>
                                    <th>{{ __('common.status') }}</th>
                                    <th>{{ __('common.action') }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            var username = "{{ __('user.username') }}";
            var email = "{{ __('user.email') }}";
            var status = "{{ __('common.status') }}";
            var action = "{{ __('common.action') }}";

            (function(window, $) {
                window.LaravelDataTables = window.LaravelDataTables || {};
                window.LaravelDataTables["dataTableBuilder"] = $("#dataTableBuilder").DataTable({
                    "serverSide": true,
                    "processing": true,
                    "ajax": {
                        data: function(d) {
                            d.lang = jQuery(".datatable-form-filter select[name='filter_lang']").val();
                            d.username = jQuery(".datatable-form-filter input[name='filter_username']").val();
                            d.email = jQuery(".datatable-form-filter input[name='filter_email']").val();
                        }
                    },
                    "columns": [{
                            "name": "username",
                            "data": "username",
                            "title": username,
                            "orderable": false,
                            "searchable": false
                        },
                        {
                            "name": "email",
                            "data": "email",
                            "title": email,
                            "orderable": false,
                            "searchable": false
                        },
                        {
                            "name": "status",
                            "data": "status",
                            "title": status,
                            "render": null,
                            "orderable": false,
                            "searchable": false,
                        },
                        {
                            "name": "action",
                            "data": "action",
                            "title": action,
                            "render": null,
                            "orderable": false,
                            "searchable": false,
                        }
                    ],
                    "searching": false,
                    "oLanguage": {
                        "sLengthMenu": "Display &nbsp;_MENU_",
                    },
                    "stateSave": true,
                    responsive: true,
                    colReorder: true,
                    /* scrollY: '50vh',
                     scrollX: true,*/
                    "buttons": [],
                    "order": [
                        [0, "asc"]
                    ],
                    "pageLength": 10,
                });
            })(window, jQuery);
        </script>
        @include('admin.user.script')
        @include('admin.comman.datatable_filter')
        @include('admin.comman.commonscript')
    @endpush
    @include('flash-message')
@endsection
