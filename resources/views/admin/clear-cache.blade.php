@extends('layouts.admin.master')

@section('title')
{{__('Clear Cache')}}
@endsection

@section('content')
   
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6">
      <h5><b>{{__('Clear Cache')}}</b></h5>
    </div>
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <div class="p-2 row" style="background:#f5f7fb">
              <div class="col-md-12 mt-3">
                <h6>Complied views will be cleared</h6>
                <hr>
                <h6>Application cache will be cleared</h6>
                <hr>
                <h6>Route cache will be cleared</h6>
                <hr>
                <h6>Configuration cache will be cleared</h6>
                <hr>
                <h6>Complied services and packages files will be removed</h6>
                <hr>
                <h6>Caches will be cleared</h6>
                <a href="{{route('clear-post')}}" class="btn btn-primary mt-3">Click to clear</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection  