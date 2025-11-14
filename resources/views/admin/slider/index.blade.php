@extends('layouts.admin.master')

@section('title')
    {{ __('slider.title') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h5><b>{{ __('slider.title') }}</b></h5>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-end mb-4" href="{{ route('slider.create') }}">{{ __('common.add') }}</a>
                <button class="btn btn-info px-5 radius-30 mx-2 float-end positionModalChange" data-bs-toggle="modal"
                    data-bs-target="#positionActivitiesModal">Change Position</button>
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
                                    <th>
                                        <div class="col-sm-8 datatable-form-filter no-padding">
                                            {!! Form::text('filter_sub_title', Request::get('filter_sub_title', null), ['class' => 'form-control']) !!}
                                        </div>
                                    </th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>{{ __('slider.slider_title') }}</th>
                                    <th>{{ __('slider.sub_title') }}</th>
                                    <th>{{ __('slider.slider_img') }}</th>
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
    <div class="modal fade" id="positionActivitiesModal" tabindex="-1" role="dialog" aria-labelledby="inctroModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Position change to Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="alert alert-danger" role="alert" style="display: none;"></div>
                    <div class="alert alert-success" role="alert" style="display: none;"></div>
                    {{ csrf_field() }}
                    <div class="modal-body" style="background-color: #edeff7;max-height: 400px;overflow: auto;">
                        <div class="row lec" id="sortable">
                            @foreach ($sliderData as $data)
                                <div class="col-md-12 sws-sort" id="row_{{ $data->id }}"><span></span>
                                    <div class="card card-custom mb-2">
                                        <div class="card-body p-2">{{ $data->title }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold change_position_reload"
                            data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary font-weight-bold change_position"
                            onclick="changePosition('Slider','id','dataTableBuilder');">Save position</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @push('scripts')
        <script type="text/javascript">
            var slider_title = "{{ __('slider.slider_title') }}";
            var sub_title = "{{ __('slider.sub_title') }}";
            var slider_img = "{{ __('slider.slider_img') }}";
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
                            d.title = jQuery(".datatable-form-filter input[name='filter_title']").val();
                            d.sub_title = jQuery(".datatable-form-filter input[name='filter_sub_title']").val();
                        }
                    },
                    "columns": [{
                            "name": "title",
                            "data": "title",
                            "title": slider_title,
                            "orderable": true,
                            "searchable": false
                        },
                        {
                            "name": "sub_title",
                            "data": "sub_title",
                            "title": sub_title,
                            "orderable": true,
                            "searchable": false
                        },
                        {
                            "name": "slider_img",
                            "data": "slider_img",
                            "title": slider_img,
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
