
<div class="row">
	<div class="col-sm-12">
		<div class="mb-3">
			{!! Form::label('name',trans("role.role_name"))!!}<span class="text-danger">*</span>
			{!! Form::text('name', null, ['class' => 'form-control required','id' => 'name']) !!}
		</div>	
	</div>
</div>

@if(isset($role))
<div class="form-group row">
  <div class="col-md-12">
    <label class="col-form-label">Permission</label>
    <table
    class="table table-sm table-bordered table-permission"
  >
    <thead>
      <tr>
        <th scope="col">Module Name</th>
        <th scope="col">Given Permission</th>
      </tr>
    </thead>
    <tbody>
    	@php
    	$a = 1;
    	@endphp
    	@foreach($permission as $value)

      	@php
      	$module_nm = str_replace("-list"," ",$value->name);
      	@endphp
        @if($a == 1)
      <tr>
        <th scope="row align-middle"> {{ $module_nm }}</th>
        <td class="ms-3">
        @endif

        	{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name ms-3')) }}
            		{{ $value->name }}
         @if($a == 4)
         @php
         $a = 0;
         @endphp
        </td>
      </tr>
        @endif
        @php
        $a++
        @endphp
      @endforeach
    </tbody>
  </table>


  </div>
</div>  
@else
<div class="form-group row">
  <div class="col-md-12">
    <label class="col-form-label">Permission</label>
    <table
    class="table table-sm table-bordered table-permission"
  >
    <thead>
      <tr>
        <th scope="col">Module Name</th>
        <th scope="col">Given Permission</th>
      </tr>
    </thead>
    <tbody>
    	@php
    	$a = 1;
    	@endphp
    	@foreach($permission as $value)

      	@php
      	$module_nm = str_replace("-list"," ",$value->name);
      	@endphp
        @if($a == 1)
      <tr>
        <th scope="row align-middle"> {{ $module_nm }}</th>
        <td class="ms-3">
        @endif

        	{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name ms-3')) }}
            		{{ $value->name }}
         @if($a == 4)
         @php
         $a = 0;
         @endphp
        </td>
      </tr>
        @endif
        @php
        $a++
        @endphp
      @endforeach
    </tbody>
  </table>


  </div>
</div> 
@endif
<div class="row">
  <div class="col-sm-12">
      <button type="submit" class="btn btn-primary">{{( !isset($page)) ? __('common.save') : __('common.update')}}</button>
      <button class="btn btn-secondary" type="reset">{{__('common.reset')}}</button>
  </div>
</div>
<style type="text/css">
	.error{
	margin: 2px 0 2px;
	color: #000;
}

</style>