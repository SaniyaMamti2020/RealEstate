@extends('layouts.admin.master')

@section('title')
    {{ __('testimonial.testimonial_list') }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datatables.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
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
                <h5><b>{{ __('testimonial.testimonial_list') }}</b></h5>
            </div>
            <div class="col-sm-6">
                @can('testimonial-create')
                    <a class="btn btn-primary float-end mb-4"
                        href="{{ route('testimonial.create') }}">{{ __('common.add') }}</a>
                @endcan

            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table id="dataTableBuilder">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="col-sm-8 datatable-form-filter no-padding">
                                            {!! Form::text('filter_title', Request::get('filter_title', null), ['class' => 'form-control']) !!}
                                        </div>
                                    </th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>{{ __('testimonial.title') }}</th>
                                    <th>{{ __('testimonial.image') }}</th>
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
            var title = "{{ __('testimonial.title') }}";
            var image = "{{ __('testimonial.image') }}";
            var status = "{{ __('common.status') }}";
            var action = "{{ __('common.action') }}";

            (function(window, $) {
                window.LaravelDataTables = window.LaravelDataTables || {};
                window.LaravelDataTables["dataTableBuilder"] = $("#dataTableBuilder").DataTable({
                    "serverSide": true,
                    "testimonialing": true,
                    "ajax": {
                        data: function(d) {
                            d.lang = jQuery(".datatable-form-filter select[name='filter_lang']").val();
                            d.title = jQuery(".datatable-form-filter input[name='filter_title']").val();
                        }
                    },
                    "columns": [{
                            "name": "title",
                            "data": "title",
                            "title": title,
                            "orderable": true,
                            "searchable": false
                        },
                        {
                            "name": "image",
                            "data": "image",
                            "title": image,
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
