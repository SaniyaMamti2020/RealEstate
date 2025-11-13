@extends('layouts.admin.master')

@section('title')
{{__('role.role')}}
@endsection

@section('content')
   
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6">
      <h5><b>{{__('role.role')}}</b></h5>
    </div>
    <div class="col-sm-6">
      @can('role-create')     
      <a class="btn btn-primary float-end mb-4" href="{{ route('roles.create')}}">{{__('common.add')}}</a>
      @endcan
    </div>
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
            <table class="display" id="dataTableBuilder">
              <thead>
                <tr>
                  <th>{{__('role.role_name')}}</th>
                  <th>{{__('common.action')}}</th>
                </tr>          
              </thead>
              <tbody>
              </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script type="text/javascript">
  var name="{{ __('role.role_name')}}";
  var action="{{ __('common.action') }}";

    (function (window, $) {
        window.LaravelDataTables = window.LaravelDataTables || {};
        window.LaravelDataTables["dataTableBuilder"] = $("#dataTableBuilder").DataTable({
            "serverSide": true,
            "processing": true,
            "ajax": {
                data: function (d) {
                }
            },
            "columns": [ 
              {
                "name": "name",
                "data": "name",
                "title": name,
                "orderable": false,
                "searchable": false 
              },
              {
                "name": "action",
                "data": "action",
                "title": action,
                "render": null,
                "orderable": false,
                "searchable": false,
              }],
            "searching": false,
            "oLanguage": {
              "sLengthMenu": "Display &nbsp;_MENU_",
            },
            "stateSave": true,
            responsive: true,
            colReorder: true,
            scrollY: '50vh',
            scrollX: true,
            "buttons": [],
            //"order": [[ 0, "asc" ]],
            "pageLength":10,
        });
    })(window, jQuery);

    
</script>
@include('admin.roles.script')
@include('admin.comman.commonscript')
@include('admin.comman.datatable_filter')   
@endpush
@include('flash-message') 
@endsection  