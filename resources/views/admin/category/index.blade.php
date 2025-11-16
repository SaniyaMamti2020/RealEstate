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
                <button class="btn btn-info px-5 radius-30 mx-2 float-end positionModalChange" data-bs-toggle="modal"
                    data-bs-target="#positionActivitiesModal">Change Position</button>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table class="display" id="dataTableBuilder">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="col-sm-12 datatable-form-filter no-padding">
                                            {!! Form::text('filter_name', Request::get('filter_name', null), ['class' => 'form-control']) !!}
                                        </div>
                                    </th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>{{ __('category.name') }}</th>
                                    <th>{{ __('category.image') }}</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Change Position of Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="alert alert-danger" role="alert" style="display: none;"></div>
                    <div class="alert alert-success" role="alert" style="display: none;"></div>
                    {{ csrf_field() }}
                    <div class="modal-body" style="background-color: #edeff7;max-height: 400px;overflow: auto;">
                        <div class="form-group">
                            <label>Category</label>
                            {!! Form::select('category_id', ['' => 'Select Category'] + $categoryData, null, [
                                'id' => 'category_id',
                                'class' => 'form-control',
                            ]) !!}
                        </div>
                        <div class="row lec" id="sortable">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold change_position_reload"
                            data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary font-weight-bold change_position"
                            onclick="changePosition('Category','id','dataTableBuilder');">Save position</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $('#category_id').change(function() {
                var id = $(this).val();
                $("#sortable").html('');
                $.get("child-category/" + id, function(products) {
                    var projects_data = '';
                    $.each(products, function(key, value) {
                        projects_data += '<div class="col-md-12 sws-sort" id="row_' + value.id +
                            '"><span></span><div class="card card-custom mb-2"><div class="card-body p-2">' +
                            value.name + '</div></div></div>';
                    });
                    $("#sortable").html(projects_data);
                    $('#sortable').sortable({
                        axis: 'y',
                        opacity: 0.7,
                        handle: 'span',
                        update: function(event, ui) {
                            var dls = 0;
                        }
                    }); // fin sortable
                });
            });
        </script>

        <script type="text/javascript">
            var name = "{{ __('category.name') }}";
            var image = "{{ __('category.image') }}";
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
                            "name": "image",
                            "data": "image",
                            "title": image,
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
