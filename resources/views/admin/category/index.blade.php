@extends('layouts.admin.master')

@section('title')
    {{ __('category.category') }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h5><b>{{ __('category.category') }}</b></h5>
            </div>
            <div class="col-sm-6">

                @can('category-create')
                    <a class="btn btn-primary float-end mb-4" href="{{ route('category.create') }}">{{ __('common.add') }}</a>
                @endcan
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table class="display" id="dataTableBuilder">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="col-sm-8 datatable-form-filter no-padding">
                                            {!! Form::text('filter_name', Request::get('filter_name', null), ['class' => 'form-control']) !!}
                                        </div>
                                    </th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>{{ __('category.name') }}</th>
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
            var name = "{{ __('category.name') }}";
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
                            d.name = jQuery(".datatable-form-filter input[name='filter_name']").val();
                        }
                    },
                    "columns": [{
                            "name": "name",
                            "data": "name",
                            "title": name,
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
                    /* colReorder: true,
                     scrollY: '50vh',
                     scrollX: true,*/
                    "buttons": [],
                    //"order": [[ 0, "asc" ]],
                    "pageLength": 10,
                });
            })(window, jQuery);
        </script>
        @include('admin.category.script')
        @include('admin.comman.datatable_filter')
        @include('admin.comman.commonscript')
    @endpush
    @include('flash-message')
@endsection
