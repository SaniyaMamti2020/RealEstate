@extends('layouts.admin.master')

@section('title')
    {{ __('pages.title') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h5><b>{{ __('pages.title') }}</b></h5>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-end mb-4" href="{{ route('pages.create') }}">{{ __('common.add') }}</a>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table id="dataTableBuilder">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="col-sm-12 datatable-form-filter no-padding">
                                            {!! Form::text('filter_page_name', Request::get('filter_page_name', null), ['class' => 'form-control']) !!}
                                        </div>
                                    </th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>{{ __('pages.page_name') }}</th>
                                    <th>{{ __('pages.page_img') }}</th>
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
            var page_name = "{{ __('pages.page_name') }}";
            var page_img = "{{ __('pages.page_img') }}";
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
                            d.page_name = jQuery(".datatable-form-filter input[name='filter_page_name']").val();
                        }
                    },
                    "columns": [{
                            "name": "page_name",
                            "data": "page_name",
                            "title": page_name,
                            "orderable": true,
                            "searchable": false
                        },
                        {
                            "name": "page_img",
                            "data": "page_img",
                            "title": page_img,
                            "orderable": true,
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
                    /*scrollY: '50vh',
                    scrollX: true,*/
                    "buttons": [],
                    "order": [
                        [0, "asc"]
                    ],
                    "pageLength": 10,
                });
            })(window, jQuery);
        </script>

        @include('admin.comman.datatable_filter')
        @include('admin.comman.commonscript')
    @endpush
    @include('flash-message')
@endsection
